@extends('layouts.app')
@section('content')
<link href="{{url('css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('css/smart_wizard_theme_dots.css')}}" rel="stylesheet" type="text/css" />
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
<script type="text/javascript" src="{{url('js/jquery.smartWizard.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

<style>
    /* Style the buttons that are used to open and close the accordion panel */
    button.accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 5px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
    }

    /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    button.accordion.active, button.accordion:hover {
        background-color: #ddd;
    }

    /* Style the accordion panel. Note: hidden by default */
    div.panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    button.accordion:after {
        content: '\02795'; /* Unicode character for "plus" sign (+) */
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    button.accordion.active:after {
        content: "\2796"; /* Unicode character for "minus" sign (-) */
    }
</style>

<main class="ce--main" role="main">

    <div class="container" id="container-data" style="margin-top:10px !important;">
        <div class="row col-md-12">
            <button class="accordion btn-success">What is a Caveat?</button>
            <div class="panel">
                <p>A warning or proviso of specific stipulations, conditions, or limitations.</p>
            </div>
            <button class="accordion btn-success ">Why a Caveat?</button>
            <div class="panel">
                <p>To warn a person that certain actions may not be taken without informing the person who gave the notice.</p>
            </div>               
        </div>
        <div class="row col-md-12">
            <hr>
            <p><center><strong>HOW THE SURE PROCESS WORKS</strong></center></p>
            <hr>
            <div class="row col-md-12">
                <fieldset>
                    <legend></legend>
                    <div class="row col-md-8">
                        @php $step=url('step.png') @endphp
                        <table>
                            <tr>
                                <td style="background-image: url('step.png'); width: 100px; height: 50px;" ><span style="color:white; font-weight: bold; margin-left: 20px;">STEP I</span></td>
                                <td>Enter Caveat Details</td>
                            </tr>
                            <tr>
                                <td style="background-image: url('step.png'); width: 100px; height: 50px;" ><span style="color:white; font-weight: bold; margin-left: 20px;">STEP II</span></td>
                                <td>Confirm your user type and details</td>
                            </tr>
                            <tr>
                                <td style="background-image: url('step.png'); width: 100px; height: 50px;" ><span style="color:white; font-weight: bold; margin-left: 20px;">STEP III</span></td>
                                <td>Agree to terms and conditions</td>
                            </tr>
                            <tr>
                                <td style="background-image: url('step.png'); width: 100px; height: 50px;" ><span style="color:white; font-weight: bold; margin-left: 20px;">STEP IV</span></td>
                                <td>Complete Caveat creation and proceed to Homepage</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            Do you want to protect your Property?
                        </div>
                        <div class='col-md-12'>
                            <a href='#protect' class="btn btn-lg btn-success" style="margin: 30px;  box-shadow: 10px 10px 5px #888888; "><strong>START HERE NOW!</strong></a>
                        </div>
                    </div>
                </fieldset>

            </div>
        </div>

    </div>

</main>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    }
}
</script>

@endsection


