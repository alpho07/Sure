@extends('layouts.app')
@section('content')
<!-- Main Page content -->
<main class="ce--main" role="main">
    <div class="container">

        @if(Session::has('message'))
        <div class="alert alert-info">
            {{session('message')}}
        </div>
        @endif
        <h3>Contacts</h3><br> 
        For More information and queries contact us on
        <table>
            <tr>

            </tr>
            <tr>
                <td>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="well well-sm">
                                <form class="form-horizontal" action="{{url('sendmail1')}}" method="post">
                                    <input type="hidden" value="From Contact Us Making enquiry form" name="caveat"/>
                                    <fieldset>
                                        <legend class="text-center">Contact us</legend>
                                        <input required id="cavid" name="cavid" type="hidden"  value="0">
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input required id="name" name="name" type="text" placeholder="Your name" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Email input-->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input id="email" required name="email" type="email" placeholder="Your email" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input id="phone" required name="phone" type="text" placeholder="Your Mobile" class="form-control">
                                            </div>
                                        </div>


                                        <!-- Message body -->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea required class="form-control" id="bodyMessage" name="bodyMessage" placeholder="Please enter your message here..." rows="5"></textarea>
                                            </div>
                                        </div>

                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-success" style="margin:10px;">Send</button>
                                            </div>
                                        </div>
                                        {{csrf_field()}}
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div></td>
            </tr>
        </table>
    </div>
</main>
@endsection

