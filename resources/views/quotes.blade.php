<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('js/form-validation.js') }}"></script>
  <script>
  $( function() {
    $( "#datepicker, #datepicker2" ).datepicker({
        firstDay: 1,
   	    beforeShowDay: $.datepicker.noWeekends,
      	dateFormat: 'yy-mm-dd'
   	  });
    $( "select.product" )
    .change(function (val,b,c,d,e,f) {
        console.log($(this).val());
    });
    var productsArr = [];
    $('.add').click(function(){
    	console.log($('.badge-pill').html());
    	$( ".cart" ).append( '<li class="list-group-item d-flex justify-content-between lh-condensed"><div><h6 class="my-0">' + $( "select.product" ).val() + '</h6><small class="text-muted">Brief description</small></div><span class="text-muted">$12</span></li>' );
    	$('.badge-pill').html(function(i, val) { return +val+1 });
    	$('.total strong span').html(12*$('.badge-pill').html());
    	$('input#totalprice').val(12*$('.badge-pill').html());
    	productsArr.push($( "select.product" ).val());

    	$('input#products').val(JSON.stringify(productsArr));
    	console.log(productsArr);
    	
    });
	  
  } );
  </script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/form-validation.css') }}" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>Quotes form</h2>
    <h3>{{ $message ?? ''}}</h3>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">0</span>
      </h4>
      <ul class="list-group mb-3 cart cart">
        <!--<li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product 1</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second 2</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li> -->
      </ul>
      <ul class="list-group mb-3 total">
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$<span></span></strong>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <form class="needs-validation" novalidate action="quotes/save" method="post">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" name="total" id="totalprice">
        <input type="hidden" name="products" id="products">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="" name="name" value="" required>
            <div class="invalid-feedback">
              Name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
          <div class="invalid-feedback">
            Please enter a valid password.
          </div>
        </div>
        
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" placeholder="0721 383 206" name="phone" required>
          <div class="invalid-feedback">
            Please enter your phone number.
          </div>
        </div>


        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="date">Start Date</label>
			<input type="text" id="datepicker" class="form-control" id="start_date" name="start_date">
          </div>
          <div class="col-md-6 mb-3">
            <label for="date">End Date</label>
			<input type="text" id="datepicker2" class="form-control" id="end_date" name="end_date">
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Product</label>
            <select class="custom-select d-block w-100 product" id="state" required>
              <option value="">Choose...</option>
              <option>Product 1</option>
              <option>Product 2</option>
            </select>
            <div class="invalid-feedback">
              Please provide a product.
            </div>
          </div>
          <button type="button" class="btn btn-primary add">Add</button>
          
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Save quote</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
</body>
</html>
