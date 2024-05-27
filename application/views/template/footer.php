<footer class="footer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p>2022 @<a href="#">Powered By Cesova</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-menu text-right">
                            <!-- <ul>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Team</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul> -->
                        </div>
                        <!-- ends: .Footer Menu -->
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <!-- <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div> -->
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
     
     

    <!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script> -->
    <!-- inject:js-->
    <script src="<?php echo base_url()?>assets/js/plugins.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.min.js"></script>
    <!-- endinject-->

<!-- sweet alert -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/sweetalert.js" rel="stylesheet"></script>


    <!--notification js -->
<script src="<?= base_url() ?>assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/notifications/js/notifications.min.js"></script>

<script type="text/javascript">

	// $(window).load(function(){
	// 	$("#ci_profiler_benchmarks legend").html("Var Dump");
	// 	$("#ci_profiler_benchmarks table").html("");
	// 	$(".hiddenVardump").each(function(){
	// 		$("#ci_profiler_benchmarks table").append($(this).html());
	// 	});


	// });
		function notification_message(success_status,message,size = false){
			if (size){
				n_size = 'large';
			}else{
				n_size = 'mini';
				}

			if (success_status == 'success'){
				var icon_class = 'fa-check-circle';
				var msg_status = '<b>Success</b> <br>';
			}

			if (success_status == 'error'){
				var icon_class = 'fa-times-circle';
				var msg_status = '<b>Error</b> <br>';
			}

			if (success_status == 'warning'){
				var icon_class = 'fa-exclamation-circle';
				var msg_status = '<b>Warning</b> <br>';
			}

			if (success_status == 'info'){
				var icon_class = 'fa-info-circle';
				var msg_status = '<b>Info</b> <br>';
			}

			Lobibox.notify(success_status, {
				pauseDelayOnHover: true,
				size: n_size,
				icon: 'fa '+icon_class,
				continueDelayOnInactiveTab: false,
				position: 'bottom right',
				msg: msg_status+' '+message
			});
		}

</script>
<script>

   const  makeDate = new Date();
   // console.log('Original date: ', makeDate.toString());
    const premnth = new Date(makeDate.setMonth(makeDate.getMonth() - 1));
   // console.log('After subtracting a month: ', premnth);
//const previousMonth = makeDate.getMonth();

    var lmnth = premnth.getMonth() + 1;
    var lyear = makeDate.getFullYear();
    //             console.log(lmnth);
//                console.log(year);
    predaysinmnth = new Date(new Date().getFullYear(), new Date().getMonth(), 0).getDate();
    labels = [];
    for (var x = 1; x <= predaysinmnth; x++) {
        labels.push(x);
    }
    //console.log(labels);

    var speedCanvas = document.getElementById("speedChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 13;

    var fmonth;
    var smonth;
    var tmonth;

    $.ajax({
        type: "post",
        dataType: "JSON",
        url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
        data: {
            func_n: "db_chart1" 
        },
        success: function (data) { 
           fmonth= data.firstMonth; 
           smonth= data.secondMonth; 
            tmonth= data.thirdMonth; 
            
           
            var dataFirst = {
        label: "This Month Sales",
        data: JSON.parse("[" + fmonth + "]"),
        lineTension: 0,
        fill: false,
        borderColor: '#5F63F1'
    };

    var dataSecond = {
        label: "Last Month Sales",
        data: JSON.parse("[" + smonth + "]"),
        lineTension: 0,
        fill: false,
        borderColor: '#C6D0DC'
    };
    var dataThird = {
        label: "Last Third Month Sales",
        data: JSON.parse("[" + tmonth + "]"),
        lineTension: 0,
        fill: false,
        borderColor: '#adc2eb'
    };

    var speedData = {
        labels: labels,
        datasets: [dataFirst, dataSecond, dataThird]
    };

    var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 100,
                fontColor: 'black'
            }
        }
    };

    var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
    });      
        }
    });
//console.log(fmonth);

const  makedate1 = new Date();
       // console.log('Original date: ', makeDate.toString());
        const thismnth = new Date(makedate1.setMonth(makedate1.getMonth()- 1));
       // console.log('After subtracting a month: ', premnth);
    //const previousMonth = makeDate.getMonth();

        var lmnth = thismnth.getMonth() + 1;
        var lyear =  makedate1 .getFullYear();
        //             console.log(lmnth);
    //                console.log(year);
        predaysinmnth = new Date(new Date().getFullYear(), new Date().getMonth(), 0).getDate();
        labels = [];
        for (var x = 1; x <= predaysinmnth; x++) {
            labels.push(x);
        }
        //console.log(labels);

        var speedCanvas = document.getElementById("Chart1");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 13;

        var fmonth;
        var smonth;
       

        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
            data: {
                func_n: "db_chart20" ,
                m_id: <?php echo $this->session->userdata("manufaturer_id") ?> 
            },
            success: function (data) { 
               fmonth= data.firstMonth; 
               smonth= data.secondMonth; 
               
            
           
                var dataFirst = {
            label: "This Month Sales",
            data: JSON.parse("[" + fmonth + "]"),
            lineTension: 0,
            fill: false,
            borderColor: '#5F63F1'
        };

        var dataSecond = {
            label: "Last Month Sales",
            data: JSON.parse("[" + smonth + "]"),
            lineTension: 0,
            fill: false,
            borderColor: '#C6D0DC'
        };
       

        var speedData = {
            labels: labels,
            datasets: [dataFirst, dataSecond, ]
        };

        var chartOptions = {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    boxWidth: 100,
                    fontColor: 'black'
                }
            }
        };

        var lineChart = new Chart(speedCanvas, {
            type: 'line',
            data: speedData,
            options: chartOptions
        });      
            }
        });
 
   

   
</script>
</body>

 </html>