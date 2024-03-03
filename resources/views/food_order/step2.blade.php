@extends('app.form')

@section('order_form')
    <div class="form-wrap">
        <form action="{{route("toNextStep", ['next_step' => 'step3'])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('Please select a restaurant')</label>
                        <select name="restaurant" class="form-control" required>
                            <option hidden="" value="">...</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant['id']}}"
                                        @if((!empty(session('food_order.restaurant')) && session('food_order.restaurant') == $restaurant['id']) || old('restaurant') == $restaurant['id']) selected @endif>{{$restaurant['name']}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('restaurant'))
                            <div class="error" style="color: red">{{ $errors->first('restaurant') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 btn-prev">
                        <a href="{{route('toStep', ['step' => 'step1'])}}"
                           class="btn btn-primary btn-block">Previous</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 btn-next">
                        <button type="submit" class="btn btn-primary btn-block">Next</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
