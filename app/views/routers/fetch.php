<?php require_once APPROOT. '/views/inc/header.php' ?>
<div class="container">

  <div class="row">
    <div class="col-md-6 mx-auto mb-4">
      <div class="card card-body bg-light mt-4">
          <h2>Router History</h2>
          <form action="<?php echo URLROOT; ?>routers/fetch/" method="POST" id="select-room-graph">
              
              <div class="form-group">
                <label for="room">Room No:</label>
                <select class="form-control form-control-lg" id="room">
                  <?php foreach ($data['routers'] as $router): ?>
                    <option value="<?php echo $router->room; ?>" <?php if ($router->room == $data['room']) {echo 'selected';} ?>><?php echo $router->room; ?></option>
                  <?php endforeach ?>
                </select>
              </div>

          </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="card card-body bg-light my-4">
      <canvas id="chart" width="400" height="200"></canvas>
    </div>
  </div>

</div>

<script>

  const select = document.querySelector('#room');
  select.onchange = () => {
    window.location = '<?php echo URLROOT; ?>routers/fetch/' + select.options[select.selectedIndex].value;
  }

  var ctx = document.getElementById("chart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [
          {
            label: 'Temperature',
            data: [12, 19, 3, 5, 2, 3],
            fill: false,
            backgroundColor: [
              'rgb(0, 153, 255)'
            ],
            borderColor: [
              'rgb(0, 153, 255)'            
            ],
            borderWidth: 2
          },
          {
            label: 'Humidity',
            data: [1, 9, 13, 15, 21, 6],
            fill: false,
            backgroundColor: [
              'rgb(255, 60, 0)'
            ],
            borderColor: [
              'rgb(255, 60, 0)'            
            ],
            borderWidth: 2
          },
          {
            label: 'Gas',
            data: [13, 20, 14, 6, 3, 4],
            fill: false,
            backgroundColor: [
              'rgb(51, 255, 51)'
            ],
            borderColor: [
              'rgb(51, 255, 51)'            
            ],
            borderWidth: 2
          }
        ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          },
          title: {
            display: true,
            text: 'Room No:<?php echo $data['room']; ?>'
        }
      }
  });
</script>

<?php require_once APPROOT. '/views/inc/footer.php' ?>
