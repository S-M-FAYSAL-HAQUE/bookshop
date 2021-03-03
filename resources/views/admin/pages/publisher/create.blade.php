@extends('admin.layout.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Add Publisher </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Add New Publisher
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" action="{{ route('publishers.store') }}" method="post">
                    @csrf
                    <div class="kt-portlet__body">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Publisher Name</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="publisher_name" placeholder="publisher name" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Publisher Bio </label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="info" placeholder="publisher info" id="example-text-input">
                            </div>
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--end::Portlet-->


        </div>

        <!-- end:: Content -->
        </div>
@endsection

