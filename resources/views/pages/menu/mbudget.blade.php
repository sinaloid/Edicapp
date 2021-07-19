@extends('template.dataShow')

@section('dataTitle')
    Budget
@stop

@section('dataContent')
    <div class="radio-bg mt-2">
        <input type="radio" name="budget" id="budget-n">
        <label class="small1" for="budget-n">Budget N EDIC</label>
        <input type="radio" name="budget" id="budget-n-1">
        <label for="budget-n-1">Budget N + 1</label>
    </div>

    <p id="output" class="text-center">
        Veuilliez Selectionnez un Budget
        <script>
            var rbudget = document.getElementById("budget-n");
            let rbudget1 = document.getElementById("budget-n-1");
            let outputBudget = document.getElementById("output");
            rbudget.onclick = function() {

                var xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        outputBudget.innerHTML = xhr.responseText;
                    }
                }

                xhr.open('GET', "{{ route('budget') }}");
                xhr.send();
                outputBudget.innerHTML = "Veuilliez patienté...";
            }
            rbudget1.onclick = function() {

                var xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        outputBudget.innerHTML = xhr.responseText;
                    }
                }

                xhr.open('GET', "{{ route('budgetn') }}");
                xhr.send();
                outputBudget.innerHTML = "Veuilliez patienté...";

            }

        </script>
    </p>
@stop
