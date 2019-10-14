@extends('client.template')

@section('styles')
    <style>
        div#home p span {
            text-decoration: underline;
        }
        sup {
            position:relative; 
            top: 0;
        }
    </style>
@endsection

@section('contents')
	<div id="home" style="margin: 0 3%">
        <div class="text-center">
            <p>Republic of the Philippines</p>
            <p><strong>SIBALOM WATER DISTRICT</strong></p>
            <p>Gonzales St., Sibalom, Antique</p>
            <p>Tel. No. 543-7699/543-7606</p>
        </div>
        
        <hr style="height: 2px; background-color: currentcolor">

        <p>
            TO OUR CONCESSIONAIRES:
         
            <br><br>
            Please be guided of the following Billing Schedule/Policy.

            <br><br>
            <strong>
                Meter Reading – <span>1<sup>st</sup> day to 12<sup>th</sup> day of the month</span>

                <br><br>
                Printing of Water Bills – <span>11</sup>th</sup> day to 15<sup>th</sup> day of the month</span>

                <br><br>
                Distribution of Water Bills – <span>15<sup>th</sup> day to 20<sup>th</sup> day of the month</span>

                <br><br>
                Due Date – <span>21 st day to 30<sup>th</sup> day of the month</span>

                Cut Off date of payment after due date without penalty – <span>9<sup>th</sup> day of the month</span>.
            </strong>

            <br><br>
            <strong>Disconnection</strong> – 1st day to 15 th day of the month for the current bill with arrears.
            
            <br><br>
            <strong>Disconnection</strong> – 16 th day to 30 th day – for no payment of promissory note and no payment of
            previous bill and arrears.
            
            <br><br>
            Please be guided accordingly.
            
            <br><br>
            Thank you very much
            
            <br><br>
            <strong>THE MANAGEMENT</strong>
        </p>
	</div>
@endsection

@section('scripts')

@endsection