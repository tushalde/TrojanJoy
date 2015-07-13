@extends('layouts.main')

@section('content')

    <div ng-app="myMarket_Sell">
        <div class="main" ng-controller="SellController">
            <div class="container">
                <div ng-repeat="product in products" class="col-md-6">
                    <div class="thumbnail">
                        <img ng-src="{{product.cover}}">
                        <p class="title">{{ product.name }}</p>
                        <p class="price">{{ product.price | currency }}</p>
                        <p class="date">{{ product.pubdate | date }}</p>
                        <div class="rating">
                            <p class="likes"><span class="glyphicon glyphicon-pencil"></span> </p>
                            <p class="dislikes"><span class="glyphicon glyphicon-trash"></span> </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <h6> </h6>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" id="poi">
        Add item
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">

                    <input id="input-705" name="kartik-input-705[]" type="file" multiple class="file-loading">
                    <script>
                        var $input = $("#input-705");
                        $input.fileinput({
                            uploadUrl: "http://localhost/file-upload-batch/2", // server upload action
                            uploadAsync: false,
                            showUpload: false, // hide upload button
                            showRemove: false, // hide remove button
                            minFileCount: 1,
                            maxFileCount: 20
                        }).on("filebatchselected", function(event, files) {
                            // trigger upload method immediately after files are selected
                            $input.fileinput("upload");
                        });
                    </script>

                    <form class="form-horizontal">
                        <input type="text" class="form-control input-block-level" id="item_title" placeholder="Title" required /> <br>
                        <div class="">
                            <textarea class="form-control" rows="3" placeholder="Description" id="description"></textarea> <br>

                            <div class="well">

                                <!-- Selling category -->

                                <div class="form-group form-inline">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                            Department:
                                        </div>
                                        <div class="col-offset-2 col-md-offset-2 col-sm-offset-2">
                                            <select class="form-control" id="sell_department">
                                                <optgroup label="All Departments">
                                                    <option>Appliances</option>
                                                    <option>Apps & Games</option>
                                                    <option>Arts, Crafts & Sewing</option>
                                                    <option>Beauty</option>
                                                    <option>Bed, Matress & Frame</option>
                                                    <option>Bikes</option>
                                                    <option>Books</option>
                                                    <option>Cameras & Camcorders</option>
                                                    <option>Cars</option>
                                                    <option>Cell phones & Accessories</option>
                                                    <option>Clothing, Shoes & Jewelry</option>
                                                    <option>Computers, Tablets & Accessories</option>
                                                    <option>Gift Cards</option>
                                                    <option>Grocery & Gourmet Food</option>
                                                    <option>Headphones & Electronic gadgets</option>
                                                    <option>Health & Personal Care</option>
                                                    <option>Home & Kitchen</option>
                                                    <option>Housing</option>
                                                    <option>Luggage & Travel Gear</option>
                                                    <option>TV, Audio & CD/DVD Player</option>
                                                    <option>Musical Instruments</option>
                                                    <option>Office products</option>
                                                    <option>Software</option>
                                                    <option>Sports & Outdoors</option>
                                                    <option>Tools</option>
                                                    <option>Toys</option>
                                                    <option>Others</option>
                                                </optgroup>
                                                <optgroup label="Trojan Store">
                                                    <option>Gameday Tickets</option>
                                                    <option>USC logo items</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!-- Selling price -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                            Selling for:
                                        </div>

                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                            <div class="checkbox form-inline">
                                                <label for="fixed_price_checkbox">
                                                    <input type="checkbox" value="Fixed price" id="fixed_price_checkbox"> Fixed Price
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    <input type="number" step="any" class="form-control" id="fixed_price_amount" placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                            <div class="checkbox form-inline">
                                                <label for="bidding_checkbox">
                                                    <input type="checkbox" value="Bidding" id="bidding_checkbox"> Bidding with base price
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    <input type="number" step="any" class="form-control" id="bidding_price_amount" placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Selling date, time -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                            Sell by:
                                        </div>
                                        <div class="col-offset-2 col-md-offset-2 col-sm-offset-2">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                                                    <input type="date" class="form-control" id="sell_by_date">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <input type="time" class="form-control" id="sell_by_time">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Pickup location -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                            Pickup location:
                                        </div>
                                        <div class="col-offset-2 col-md-offset-2 col-sm-offset-2">
                                            <div class="row">
                                                <div class="col-lg-5  col-md-5 col-sm-5 col-xs-12">
                                                    <input type="text" placeholder="Address" size="25" class="form-control" id="pickup_address">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                                    <input type="number" placeholder="Zip" size="8" class="form-control" id="pickup_zip">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div> <!-- div well ends -->


                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnSave">Save this post</button>
                </div>
            </div>
        </div>
    </div>

@stop