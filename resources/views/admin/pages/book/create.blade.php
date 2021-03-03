@extends('admin.layout.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">New book </h3>
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
                            Add New Book
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="kt-portlet__body">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Book Name</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="book_title" placeholder="book name" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Book Description </label>
                            <div class="col-10">
                                <textarea name="book_description" class="form-control" id="exampleTextarea" placeholder="Book description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Select category</label>
                            <div class=" col-10 ">
                                <select class="form-control kt-select2" id="kt_select2_3" name="categories[]" multiple="multiple">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Select Author</label>
                            <div class=" col-10">
                                <select class="form-control kt-select2" id="kt_select2_4" name="authors[]" multiple="multiple">
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publisher_id" class="col-2 col-form-label">Select publisher</label>
                            <div class="col-10">
                                <select class="form-control" name="publisher_id" id="exampleSelect1">
                                    <option value="0">select publisher</option>
                                    @foreach( $publishers as $publisher)
                                        <option value=" {{ $publisher->id }} ">{{ $publisher->publisher_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Cover book</label>
                            <div class="custom-file col-10">
                                <input name="book_photo" class="form-control" type="file"  id="image" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2"> </div>
                            <div class="col-10">
                                <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                     alt="preview image" style="max-height: 250px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Price</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="0" name="price" id="example-number-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Quantity</label>
                            <div class="col-10">
                                <input class="form-control" type="number" value="0" name="quantity" id="example-number-input">
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

