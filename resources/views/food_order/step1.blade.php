@extends('app.form')

@section('order_form')
    <div class="form-wrap">
        <form action="{{route("toNextStep", ['next_step' => 'step2'])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('Please select a meal')</label>
                        <select name="meal_time" class="form-control" required>
                            <option hidden="" value="">...</option>
                            @foreach($meal_time as $time)
                                <option value="{{$time['id']}}"
                                        @if((!empty(session('food_order.meal_time')) && session('food_order.meal_time') == $time['id']) || old('meal_time') == $time['id']) selected @endif>{{$time['name']}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('meal_time'))
                            <div class="error" style="color: red">{{ $errors->first('meal_time') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Please enter number of people</label>
                        <input style="width: 200px" type="number" name="people_number" min="1" max="10"
                               value="{{session('food_order.people_number' ?? old('people_number'))}}"
                               class="form-control" required>
                        @if($errors->has('people_number'))
                            <div class="error" style="color: red">{{ $errors->first('people_number') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 btn-next">
                    <button type="submit" class="btn btn-primary btn-block">Next</button>
                </div>
            </div>
        </form>
    </div>
@endsection
