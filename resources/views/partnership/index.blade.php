@extends('layouts.app')

@section('meta_title', $meta_title)

@section('body')
<div class="row">
    <div class="col-md-6">
        <div class="partnership-info partnership-info-left">

            <h3>@lang('dancinggoat.Partnership_LeftInfoTitle')</h3>

            <ul>
                <li>@lang('dancinggoat.Partnership_LeftInfoItem1')</li>
                <li>@lang('dancinggoat.Partnership_LeftInfoItem2')</li>
                <li>@lang('dancinggoat.Partnership_LeftInfoItem3')</li>
            </ul>

        </div>
    </div>
    <div class="col-md-6">
        <div class="partnership-info partnership-info-right">

            <h3>@lang('dancinggoat.Partnership_RightInfoTitle')</h3>

            <ul>
                <li>@lang('dancinggoat.Partnership_RightInfoItem1')</li>
                <li>@lang('dancinggoat.Partnership_RightInfoItem2')</li>
                <li>@lang('dancinggoat.Partnership_RightInfoItem3')</li>
                <li>@lang('dancinggoat.Partnership_RightInfoItem4')</li>
                <li>@lang('dancinggoat.Partnership_RightInfoItem5')</li>
                <li>@lang('dancinggoat.Partnership_RightInfoItem6')</li>
            </ul>

        </div>
    </div>
</div>



<section class="row text-and-image">
    <h3 class="col-lg-12">
        @lang('dancinggoat.Partnership_Title')
    </h3>
    <div>
       {!! __('dancinggoat.Partnership_Text') !!}
    </div>
</section>

<section class="row" id="lp-form">
    <div class="container">
        <h3> @lang('dancinggoat.Partnership_ApplicationTitle')</h3>
        <div class="row">
            <div class="col-md-5">
                <div> @lang('dancinggoat.Partnership_ApplicationText')</div>
            </div>

            <div class="col-md-6 col-md-offset-1">
                @if($partnership_requested)
                
                    <div class="partnership-info-right">
                        <span class="InfoLabel">@lang('dancinggoat.Partnership_RequestLabel')</span>
                    </div>
                
                @else

                    <div id="pnlForm" class="FormPanel">
                        <form id="partnership-application" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-group-label">
                                    <strong><label id="CompanyName_lb" for="CompanyName_txtText">@lang('dancinggoat.Partnership_Form_CompanyName')</label></strong>
                                </div>
                                <div class="form-group-input">
                                    <input name="CompanyName" type="text" maxlength="200" id="CompanyName_txtText" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group-label">
                                    <strong><label id="FirstName_lb" for="FirstName_txtText">@lang('dancinggoat.Partnership_Form_FirstName')</label></strong>
                                </div>
                                <div class="form-group-input">
                                    <input name="FirstName" type="text" maxlength="200" id="FirstName_txtText" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group-label">
                                    <strong><label id="LastName_lb" for="LastName_txtText">@lang('dancinggoat.Partnership_Form_LastName')</label></strong>
                                </div>
                                <div class="form-group-input">
                                    <input name="LastName" type="text" maxlength="200" id="LastName_txtText" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group-label">
                                    <strong><label id="Phone_lb" for="Phone_txtText">@lang('dancinggoat.Partnership_Form_Phone')</label></strong> (optional)
                                </div>
                                <div class="form-group-input">
                                    <input name="Phone" type="text" maxlength="200" id="Phone_txtText" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group-label">
                                    <strong><label id="Email_lb" for="Email_txtEmailInput">@lang('dancinggoat.Partnership_Form_Email')</label></strong>
                                </div>
                                <div class="form-group-input">
                                    <input name="Email" type="text" maxlength="254" id="Email_txtEmailInput" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <fieldset class="partnership-form-fieldset">
                                    <legend class="form-group-label"><strong>@lang('dancinggoat.Partnership_Form_Interest')</strong></legend>
                                    <span id="BecomePartner_list" class="radio radio-list-vertical">
                                        <input id="BecomePartner_list_0" type="radio" name="BecomePartner" value="wholesale partner"/>
                                        <label for="BecomePartner_list_0">@lang('dancinggoat.Partnership_Form_Interest_WholesalePartner')</label>
                                    </span>
                                    <span id="BecomePartner_list" class="radio radio-list-vertical">
                                        <input id="BecomePartner_list_1" type="radio" name="BecomePartner" value="partner café"/>
                                        <label for="BecomePartner_list_1">@lang('dancinggoat.Partnership_Form_Interest_PartnerCafe')</label>
                                    </span>
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="btnOK" value="@lang('dancinggoat.Partnership_Form_Apply')" class="btn btn-primary" />
                            </div>

                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(function () {
            $("#partnership-application").validate({
                errorClass: "message message-error",
                rules: {
                    Email: "email",
                    Phone: "digits"
                }
            });
        });
    </script>

@endsection
