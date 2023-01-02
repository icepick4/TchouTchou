<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=EUR"></script>

<script>
  paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '77.44' // Can also reference a variable or function
          }
        }]
      });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
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
    <h1>Détails de votre voyage à <span><?= $station_name ?></h1>
    <div id="travel_details">
        <p><?php 
            if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Monday") {
                echo MONDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Tuesday") {
                echo TUESDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Wednesday") {
                echo WEDNESDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Thursday") {
                echo THURSDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Friday") {
                echo FRIDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Saturday") {
                echo SATURDAY;
            } else {
                echo SUNDAY;
            }
            if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "January") {
                echo JANUARY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "February") {
                echo FEBRUARY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "March") {
                echo MARCH;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "April") {
                echo APRIL;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "May") {
                echo MAY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "June") {
                echo JUNE;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "July") {
                echo JULY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "August") {
                echo AUGUST;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "September") {
                echo SEPTEMBER;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "October") {
                echo OCTOBER;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "November") {
                echo NOVEMBER;
            } else {
                echo DECEMBER;
            }
     ?></p>
        <p><span class="colored"><?php echo $ticket[0]['DEPARTURE_TIME']?></span> ● <?= $from?></p>
        <p>Voyage n°<span class="colored"><?php echo $ticket[0]['TRAVEL_ID']?></span></p>
        <p><span class="colored"><?php echo $ticket[0]['END_TIME']?></span> ● <?= $to?></p>
    </div>
  </div>
  <div id="paypal-button-container">
    <p><?= $_POST['price'] ?> €</p>
  </div>
</div>
<?php require_once(PATH_VIEWS . 'footer.php');
