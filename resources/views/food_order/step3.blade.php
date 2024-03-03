@extends('app.form')

@section('order_form')
    <div class="form-wrap">
        @if($errors)
            @foreach($errors->all() as $e)
                <div class="error" style="color: red">{{$e}}</div>
            @endforeach
        @endif
        <div class="row" style="margin-bottom: 55px">
            <div class="col-md-4 btn-next">
                <input id="add_new" class="btn-add-new btn btn-primary btn-add" type="button" value="Add New">
            </div>
        </div>

        <form action="{{ route("toNextStep", ['next_step' => 'step4']) }}" method="post">
            @csrf
            <div class="row form_custom">
                @if(!empty(session('dish_temp')) && !empty(session('number_serving_temp')) )
                    @foreach(session('dish_temp') as $key => $d)
                        <div class="col-md-6 @if($key == 0) form_template @endif form_instance" style="display: flex">
                            <div class="form-group" style="margin-right: 100px">
                                <label>Please select a dish</label>
                                <select name="dish[]" class="form-control available-dish" required>
                                    <option hidden="" value="">...</option>
                                    @foreach($dishs as $dish)
                                        <option value="{{ $dish['id'] }}"
                                                @if($d == $dish['id']) selected @endif>{{ $dish['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Please enter no. of servings</label>
                                <input style="width: 200px" type="number" name="number_serving[]" min="1" max="10"
                                       class="form-control" required value="{{session('number_serving_temp')[$key]}}">
                            </div>

                            <div class="row" style="margin: auto">
                                <div class="col-md-4 btn-next">
                                    <input class="btn-add-new btn btn-primary btn-remove" type="button" value="Remove">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 form_template form_instance" style="display: flex">
                        <div class="form-group" style="margin-right: 100px">
                            <label>Please select a dish</label>
                            <select name="dish[]" class="form-control available-dish" required>
                                <option hidden="" value="">...</option>
                                @foreach($dishs as $dish)
                                    <option value="{{ $dish['id'] }}"
                                            @if(old('dish') == $dish['id']) selected @endif>{{ $dish['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Please enter no. of servings</label>
                            <input style="width: 200px" type="number" name="number_serving[]" min="1" max="10"
                                   class="form-control" required value="1">
                        </div>

                        <div class="row" style="margin: auto">
                            <div class="col-md-4 btn-next">
                                <input class="btn-add-new btn btn-primary btn-remove" type="button" value="Remove">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 btn-prev">
                    <a href="{{ route('toStep', ['step' => 'step2']) }}"
                       class="btn btn-primary btn-block">Previous</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 btn-next">
                    <button type="submit" class="btn btn-primary btn-block">Next</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            var count = {{count($dishs)}};
            var formCounter = 1;
            var formTemplate = `
                <div class="col-md-6 form_instance" style="display: flex">
                    <div class="form-group" style="margin-right: 100px">
                        <label>Please select a dish</label>
                        <select name="dish[]" class="form-control available-dish" required>
                            <option hidden="" value="">...</option>
                            @foreach($dishs as $dish)
            <option value="{{ $dish['id'] }}">{{ $dish['name'] }}</option>
                                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label>Please enter no. of servings</label>
                <input style="width: 200px" type="number" name="number_serving[]" min="1" max="10"
                       class="form-control" value="1" required>
            </div>

            <div class="row" style="margin: auto">
                <div class="col-md-4 btn-next">
                    <input class="btn-add-new btn btn-primary btn-remove" type="button" value="Remove">
                </div>
            </div>
        </div>`;

            function updateDishOptions() {
                if ($('.form_instance').length >= count) {
                    $('.btn-add').hide()
                } else {
                    $('.btn-add').show()
                }

                if ($('.form_instance').length <= 1) {
                    $('.btn-remove').hide()
                } else {
                    $('.btn-remove').show()
                }
                $('select.available-dish option').prop('disabled', false);

                $('select.available-dish').each(function () {
                    var selectedDish = $(this).val();
                    $('select.available-dish').not(this).find('option[value="' + selectedDish + '"]').prop('disabled', true);
                });
            }

            updateDishOptions();

            $('#add_new').on('click', function () {

                $('.form_custom').append(formTemplate);
                formCounter++;
                updateDishOptions();
            });

            $('.form_custom').on('click', '.btn-remove', function () {
                $(this).closest('.form_instance').remove();
                updateDishOptions();
            });

            $('.form_custom').on('change', 'select.available-dish', function () {
                updateDishOptions();
            });
        });
    </script>
@endsection
