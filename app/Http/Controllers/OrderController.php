<?php

namespace App\Http\Controllers;

use App\Http\Enums\StepsEnum;
use App\Http\Requests\NextStepRequest;
use App\Repositories\MealNameRepository;
use App\Repositories\MealTimeRepository;
use App\Repositories\RestaurantsRepository;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
    protected $mealTimeRepository;
    protected $mealNameRepository;
    protected $restaurantsRepository;

    public function __construct(
        MealTimeRepository    $mealTimeRepository,
        MealNameRepository    $mealNameRepository,
        RestaurantsRepository $restaurantsRepository,
    )
    {
        $this->mealTimeRepository = $mealTimeRepository;
        $this->mealNameRepository = $mealNameRepository;
        $this->restaurantsRepository = $restaurantsRepository;
    }

    public function order($step)
    {
        if (!in_array($step, StepsEnum::STEPS)) abort('404');
        $data = [];
        $template = '';
        if (!empty($step)) {
            switch ($step) {
                case "step1":
                    session(['dish_temp' => '']);
                    session(['number_serving_temp' => '']);
                    if (empty(session('food_order'))) {
                        session_start();
                        session(['food_order' => []]);
                    }
                    $meal_time = $this->mealTimeRepository->all();
                    $data['meal_time'] = $meal_time;
                    $template = 'food_order.step1';
                    break;
                case "step2":
                    session(['dish_temp' => '']);
                    session(['number_serving_temp' => '']);
                    $meal_time_id = session('food_order.meal_time');
                    $restaurants = $this->mealTimeRepository->find($meal_time_id)->restaurants->unique();
                    $data['restaurants'] = $restaurants;
                    $template = 'food_order.step2';
                    break;
                case "step3":
                    $conditions = [
                        'restaurant_id' => session('food_order.restaurant'),
                        'meal_time_id' => session('food_order.meal_time')
                    ];
                    $dishs = $this->mealNameRepository->findWhere($conditions);
                    $data['dishs'] = $dishs;
                    $template = 'food_order.step3';
                    break;
                case "step4":
                    $dishes = [];
                    $meal = $this->mealTimeRepository->find(session('food_order.meal_time'))->name;
                    $people = session('food_order.people_number');
                    $restaurant = $this->restaurantsRepository->find(session('food_order.restaurant'))->name;
                    foreach (session('food_order.dishes') as $key => $dish) {
                        $dishes[$key]['dish_name'] = $this->mealNameRepository->find($dish['dish_id'])->name;
                        $dishes[$key]['number_serving'] = $dish['number_serving'];
                    }
                    $data = [
                        'meal' => $meal,
                        'people' => $people,
                        'restaurant' => $restaurant,
                        'dishes' => $dishes,
                    ];
                    $template = 'food_order.step4';
                    break;
                default:
                    abort('404');
            }
            return !empty($data) ? view($template)->with($data) : view($template);
        }
    }

    public function toNextStep(NextStepRequest $request)
    {
        $data = $request->all();
        if (!empty($data)) {
            switch ($data['next_step']) {
                case 'step2':
                    session(['food_order' => []]);
                    session()->put('food_order.meal_time', $data['meal_time']);
                    session()->put('food_order.people_number', $data['people_number']);
                    break;
                case 'step3':
                    session()->put('food_order.restaurant', $data['restaurant']);
                    break;
                case 'step4':
                    $dishArray = $request->dish;
                    $numberServingArray = $request->number_serving;
                    $order_check = count($dishArray) * array_sum($numberServingArray);

                    if ($order_check >= (int)session('food_order.people_number') && $order_check <= 10) {
                        $result = array_map(function ($dishId, $numberServing) {
                            return [
                                "dish_id" => (int)$dishId,
                                "number_serving" => (int)$numberServing,
                            ];
                        }, $dishArray, $numberServingArray);

                        session()->put('food_order.dishes', $result);
                    } else {
                        return redirect()->back()->withErrors(['msg' => __('The total number of dishes (i.e., the Number of Dishes * corresponding Number of Servings) must be greater than or equal to the number of people selected in the first step and is capped at a maximum of 10.')]);
                    }
                    break;
                default:
                    abort('404');
            }

            return redirect()->route('toStep', ['step' => $data['next_step']]);
        }
    }
}
