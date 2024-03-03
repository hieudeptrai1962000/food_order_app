@extends('app.form')

@section('order_form')
    <div class="form-wrap">
        <form action="{{route("toNextStep", ['next_step' => 'done'])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6" style="display: flex">
                    <div class="form-group">
                        <label>Meal</label>
                        <input style="width: 200px" type="text" disabled value="{{$meal}}"
                               class="form-control" required>
                    </div>
                    <div class="form-group" style="margin-left: 200px">
                        <label>No. of. People</label>
                        <input style="width: 200px" type="text" disabled value="{{$people}}"
                               class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6" style="display: flex">
                    <div class="form-group">
                        <label>Restaurant</label>
                        <input style="width: 200px" type="text" disabled value="{{$restaurant}}"
                               class="form-control" required>
                    </div>
                    <div class="form-group" style="margin-left: 200px">
                        <label>Dishes</label>
                        <div style="display: grid">
                            @foreach($dishes as $dish)
                                <input style="width: 200px; margin-bottom: 20px" type="text" disabled
                                       value="{{$dish['dish_name'] . ' - ' . $dish['number_serving']}}"
                                       class="form-control" required>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 btn-prev">
                    <a href="{{ route('toStep', ['step' => 'step3']) }}"
                       class="btn btn-primary btn-block">Previous</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 btn-next">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
