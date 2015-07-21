$(document).ready(function() {
    $('#poi').click(function() {
        $('#myModal').modal();
    });
    $('#btnSave').click(function() {
        var title = $('#item_title').val();
        var des = $('#description').val();
        var fixed_price = $('#fixed_price_amount').val();
        var bidding_price = $('#bidding_price_amount').val();
        var sell_by_date = $('#sell_by_date').val();
        var sell_by_time = $('#sell_by_time').val();
        var pickup_address = $('#pickup_address').val();
        var pickup_zip = $('#pickup_zip').val();

        $('h6').html("Title: "+title+"<br>Description: "+des+"<br>Fixed Price: "+fixed_price+"<br>Bidding price: "+bidding_price+"<br>Sell by: "+sell_by_date+", "+sell_by_time+"<br>Pickup location: "+pickup_address+", "+pickup_zip);
        //$('#myModal').modal('hide');
    });
    $('#clear_sell_item').click(function() {
        $('#input-705').fileinput('refresh');
        $('#item_title').val("");
        $('#description').val("");
        $("select#sell_dept").find("option#default").attr("selected", "selected");
        $('#fixed_price_checkbox').prop('checked', false);
        $('#fixed_price_amount').val("");
        $('#bidding_checkbox').prop('checked', false);
        $('#bidding_price_amount').val("");
        $('#sell_by_date').val("");
        $('#sell_by_time').val("");
        $('#pickup_address').val("");
        $('#pickup_zip').val("");
        $('input:-webkit-autofill').css('-webkit-box-shadow','0 0 0px 1000px white inset');
    });

});

var myMarket_Sell = angular.module('myMarket_Sell', []);
myMarket_Sell.service('myService', function () { /* ... */ });
myMarket_Sell.controller('SellController', ['$scope',function($scope){
        $scope.products=
            [
                {
                    title: 'Title 1',
                    price: 19,
                    pubdate: new Date('2014', '03', '08'),
                    cover: 'images/books.jpeg' ,

                },
                {
                    title: 'Title 2',
                    price: 8,
                    pubdate: new Date('2013', '08', '01'),
                    cover: 'images/books.jpeg' ,

                },
                {
                    title:'Title 3',
                    price:10,
                    pubdate: new Date('2012','01','01'),
                    cover: 'images/books.jpeg',
                    },
                {
                    title:'Title 4',
                    price:22,
                    pubdate: new Date('2015','06','23'),
                    cover:'images/books.jpeg' ,
                    }
            ];

    }]);