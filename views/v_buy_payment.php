<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=EUR"></script>

<script>
  paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?= $_POST['price'] ?> // Can also reference a variable or function
          }
        }]
      });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
        const transaction = orderData.purchase_units[0].payments.captures[0];
        var xhttp = new XMLHttpRequest();
        xhttp.open(
          "GET",
          "ajax/addTicket.php?travel=" + $_POST['travel'] + "&from=" + $_POST['from'] + "&to=" + $_POST['to'] + "&first_name=" + $_SESSION['first_name'] + "&last_name=" + $_SESSION['last_name'] + "&seat" + $_POST['seat'] + "&nbr" + $_POST['nbr'] + "&user_id" + $_SESSION['user_id'] + "&price"
            ,
          true
        );
        xhttp.send();
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
      });
    }
  }).render('#paypal-button-container');
</script>
<div id="travel-payment">
  <div id="travel-details">
    <h1>Détails de votre voyage vers <span><?= $to_station_name ?></h1>
    <div id="travel_details">
        <p><?php 
            echo getDay($from_station_date_departure);
            echo ' '.date('d',strtotime($from_station_date_departure)).' ';
        echo getMonth($from_station_date_departure);
     ?></p>
        <p><span class="colored"><?= $from_station_time_departure ?></span> ● <?= $from_station_name?></p>
        <p>Voyage n°<span class="colored"><?= $_POST['travel']?></span></p>
        <p><span class="colored"><?= $to_station_time_arrival ?></span> ● <?= $to_station_name?></p>
    </div>
  </div>
  <div id="paypal-button-container">
    <p><?= $_POST['price'] ?> €</p>
  </div>
</div>
<?php require_once(PATH_VIEWS . 'footer.php');
