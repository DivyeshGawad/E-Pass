<div class="box-shadow"><!------Box Shadow Start-------->
        <div class="card"><!------Card Start-------->
            <div class="title-bg"><!------title Start-------->
                <div class="logo"><!------Logo Start-------->
                    <img src="img/logo.png" alt="logo" height="50px" width="auto">
                </div><!------Logo End-------->
                <div class="sup-title"><!------Super Title Start-------->
                    <h3 style="color: azure; text-shadow: 0 0 px rgb(0, 0, 0)">MAHARASHTRA STATE RURAL TRANSPORT CORPORATION</h3>
                </div><!------Super Title End-------->
            </div><!------Title End-------->
            <div class="data-box"> <!------Data Box Start-------->
                <div class="profile">
                    <img src="upload/profile/<?php echo $img; ?>" alt="profile">
                    <strong style="-webkit-text-stroke: 0.5px black; color: #00c700; text-shadow: 0 0 8px black; margin: 10px 10px ; display: inline-block; position: absolute; font-size: 22px; line-height: 20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">CITY TRAVEL PERMIT CARD</strong>
                </div><!------Data End-------->
                <div class="data"><!------Data Start-------->
                    <Strong>NAME:</Strong>
                    <span><?php echo $name; ?></span>
                </div><!------Data End-------->
                <div class="data"><!------Data Start-------->
                    <Strong>D-O-B :</Strong>
                    <span><?php echo $dob; ?></span>
                </div><!------Data End-------->
                <div class="data"><!------Data Start-------->
                    <Strong>ROUTE :</Strong>
                    <span><?php echo $route; ?></span>
                </div><!------Data End-------->
                <div class="data"><!------Data Start-------->
                    <Strong>EXPIRY :</Strong>
                    <span><?php echo $expiry; ?></span>
                </div><!------Data End-------->
                <div class="data"><!------Data Start-------->
                    <Strong></Strong>
                    <span></span>
                </div><!------Data End-------->
                <div class="data"><!------Data Start-------->
                    <Strong></Strong>
                    <span></span>
                </div><!------Data End-------->
            </div><!------Box Shadow End-------->
            <div class="qr"><!------QR Code Start-------->
                 <img src="upload/qr/<?php echo $qrimg; ?>" alt="QR code" height="125px" width="125px" style="float: right; margin-top: 0px;"> 
            </div><!-----------QR Code End------------>>
            
        </div><!------Card End-------->
    </div><!------Box Shadow End-------->
    <br><br><br>
    
    <div class="box-shadow"><!------Box Shadow Start-------->
        <div class="card title-bg"><!------Card Start-------->
            <div class="data databox" style="padding: 20px;"> <!------Data Box Start-------->
                <strong style="float: right;color: gold; text-decoration: underline; padding-bottom: 10px;">MH<?php echo $pass_id; ?></strong>
                <Strong>ADDRESS :</Strong>
                <span><?php echo $add; ?> </span><br>
                <Strong>PHONE :</Strong>
                <span><?php echo $num; ?></span><br>
                <!-- <Strong>ISSUED DATE :</Strong>
                <span>19/07/2021</span><br> -->
                <Strong>VALID FOR :</Strong>
                <span><?php echo $ser; ?></span><br>
                <div class="title-bg"><!------title Start-------->
                    <div class="logo" style="text-align: center;"><!------Logo Start-------->
                        <img src="img/logo.png" alt="logo" height="60px" width="auto">
                    </div><!------Logo End-------->
                </div><!------Title End-------->
                <h5 style="color: azure; text-shadow: 0 0 px rgb(0, 0, 0); text-align: right; padding: 0px;">MAHARASHTRA STATE RURAL TRANSPORT CORPORATION <br><span style="float: left; font-size: 10px;">Toll Free No. : 1800-1234-5678</span></h5>
                
            </div><!------Card Number End-------->
        </div><!------Card End-------->
    </div><!------Box Shadow End-------->

    <center>
        <div class="btn">
            <button onclick="print()">
                Print Card
        </div>
    </center>