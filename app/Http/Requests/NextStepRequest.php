<?php

namespace App\Http\Requests;

use App\Models\MealName;
use App\Models\MealTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NextStepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $validate = [];
        if (!empty($_GET['next_step'])) {
            switch ($_GET['next_step']) {
                case 'step2':
                    {
                        $validate = [
                            'meal_time' => [
                                'required',
                                Rule::in(MealTime::query()->pluck('id')->all()),
                                Rule::exists('meal_time', 'id'),
                            ],
                            'people_number' => [
                                'required',
                                'integer',
                                'min:1',
                                'max:10',
                            ],
                        ];
                    }
                    break;
                case 'step3':
                    {
                        $mealTimeId = session('food_order.meal_time');
                        $validRestaurants = MealTime::find($mealTimeId)->restaurants->unique()->pluck('id');

                        $validate = [
                            'restaurant' => [
                                'required',
                                Rule::in($validRestaurants->toArray())
                            ],
                        ];
                    }
                    break;
                case 'step4':
                    {
                        session(['dish_temp' => $_POST['dish']]);
                        session(['number_serving_temp' => $_POST['number_serving']]);
                        $validate = [
                            'dish.*' => [
                                'in_valid_dish',
                                'required',
                                'integer',
                                'distinct',
                            ],
                            'number_serving.*' => [
                                'required',
                                'integer',
                                'min:1',
                                'max:10',
                            ],
                        ];
                    }
                    break;
            }

            return $validate;
        }
    }


    public function messages(): array
    {
        return [
            'dish.*.in_valid_dish' => trans('Dish invalid'),
        ];
    }

}
