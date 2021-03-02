@extends('admin.layout.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Create Category </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>

        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Create New Category
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="kt-portlet__body">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Category Name</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="name" placeholder="write category name" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Category Description </label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="category_description" placeholder="write category description" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent_id" class="col-2 col-form-label">Select parent category</label>
                            <div class="col-10">
                                <select class="form-control" name="parent_id" id="exampleSelect1">
                                    <option value="0">select parent category</option>
                                    @foreach( $categories as $category)
                                        <option value=" {{ $category->id }} ">{{ $category->name }}</option>
                                    @endforeach
                                </select>
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

