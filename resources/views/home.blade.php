@extends('Layout.guest')
@section('content')
<div class="l-content">
    <div class="pricing-tables pure-g">
        <div class="pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-free">
                <div class="pricing-table-header">
                    <h2>Grooming</h2>

                    <span class="pricing-table-price">
                        $15 <span>per Services</span>
                    </span>
                </div>

                <ul class="pricing-table-list">
                    <li>Free pet food</li>
                    <li>Guarantee 1 week</li>
                    <li>Standard customer support</li>
                    <li>Vip + 5$</li>
                    <li>Trusted</li>
                </ul>
                <form action="/login">
                    <button onclick="alert('Anda Harus Login Terlebih dahulu')" class="button-choose pure-button">Choose</button>
                </form>
            </div>
        </div>
        <p>


        </p>
        <div class="pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-biz pricing-table-selected">
                <div class="pricing-table-header">
                    <h2>Pet Clinic</h2>

                    <span class="pricing-table-price">
                        $25 <span>per month</span>
                    </span>
                </div>

                <ul class="pricing-table-list">
                    <li>Free pet food</li>
                    <li>Guarantee 1 week</li>
                    <li>Standard customer support</li>
                    <li>Profesional treatment</li>
                    <li>Trusted</li>
                </ul>
                <form action="/login">
                    <button onclick="alert('Anda Harus Login Terlebih dahulu')" class="button-choose pure-button">Choose</button>
                </form>
            </div>
        </div>
        <p>

            
        </p>
        <div class="pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-enterprise">
                <div class="pricing-table-header">
                    <h2>Pet Training</h2>

                    <span class="pricing-table-price">
                        $45 <span>per month</span>
                    </span>
                </div>

                <ul class="pricing-table-list">
                    <li>Free pet food</li>
                    <li>Guarantee 1 week</li>
                    <li>Standard customer support</li>
                    <li>Profesional treatment</li>
                    <li>Trusted</li>
                </ul>
                <form action="/login">
                    <button onclick="alert('Anda Harus Login Terlebih dahulu')" class="button-choose pure-button">Choose</button>
                </form>
            </div>
        </div>
        <p>
            
            
        </p>
        <div class="pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-enterprise">
                <div class="pricing-table-header">
                    <h2>Pet sitter</h2>

                    <span class="pricing-table-price">
                        $45 <span>per month</span>
                    </span>
                </div>

                <ul class="pricing-table-list">
                    <li>Free pet food</li>
                    <li>Guarantee 1 week</li>
                    <li>Standard customer support</li>
                    <li>Profesional treatment</li>
                    <li>Trusted</li>
                </ul>
                <form action="/login">
                    <button onclick="alert('Anda Harus Login Terlebih dahulu')" class="button-choose pure-button">Choose</button>
                </form>
            </div>
        </div>
    </div> 
</div>
<P align="center"><iframe width="560" height="315" src="https://www.youtube.com/embed/pjVfKQpP0ZQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></P>
    <div class="footer l-box">
@endsection