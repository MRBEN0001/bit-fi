@extends('layouts.guest')
@section('content')
<!-- header end -->

<!-- Header Ends -->
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
    "symbols": [
      {
        "proName": "BITSTAMP:BTCUSD",
        "title": "Bitcoin"
      },
      {
        "proName": "BITSTAMP:ETHUSD",
        "title": "Ethereum"
      },
      {
        "description": "Bitcoin Cash",
        "proName": "PEPPERSTONE:BCHUSD"
      },
      {
        "description": "Solana",
        "proName": "BINANCE:SOLUSDT"
      },
      {
        "description": "Binance Coin",
        "proName": "BINANCE:BNBUSDT"
      },
      {
        "description": "Ripple",
        "proName": "BINANCE:XRPUSDT"
      },
      {
        "description": "Doge Coin",
        "proName": "BINANCE:DOGEUSDT"
      },
      {
        "description": "Trump Coin",
        "proName": "KCEX:TRUMPUSDT"
      },
      {
        "description": "Sui Coin",
        "proName": "COINBASE:SUIUSD"
      }
    ],
    "showSymbolLogo": true,
    "isTransparent": false,
    "displayMode": "adaptive",
    "colorTheme": "dark",
    "locale": "en"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->

        <!-- Slider Starts -->
        <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators Starts -->
            <ol class="carousel-indicators visible-lg visible-md">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!-- Indicators Ends -->
            <!-- Carousel Inner Starts -->
            <div class="carousel-inner">
                <!-- Carousel Item Starts -->
                <div class="item active bg-parallax item-1">
                    <div class="slider-content">
                        <div class="container">
                            <div class="slider-text text-center">
                                <h3 class="slide-title"><span>Secure</span> and <span>Easy Way</span><br/> To <span>Crypto.</span> Investment</h3>
                                <p>
                                    <a href="{{ route('login') }}" class="slider btn btn-primary">Invest Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
                <!-- Carousel Item Starts -->
                <div class="item bg-parallax item-2">
                    <div class="slider-content">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="slider-text text-center">
                                    <h3 class="slide-title"><span>Crypto.</span> Investment Company <br/>You can <span>Trust</span> </h3>
                                    <p>
                                        <a href="{{ route ('plan') }}" class="slider btn btn-primary">Our Plans</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
            </div>
            <!-- Carousel Inner Ends -->
            <!-- Carousel Controlers Starts -->
            <a class="left carousel-control" href="{{ asset ('index-2.html') }}#main-slide" data-slide="prev">
				<span><i class="fa fa-angle-left"></i></span>
			</a>
            <a class="right carousel-control" href="{{ asset ('index-2.html') }}#main-slide" data-slide="next">
				<span><i class="fa fa-angle-right"></i></span>
			</a>
            <!-- Carousel Controlers Ends -->
        </div>
        <!-- Slider Ends -->


        <!-- Features Section Starts -->
        <section class="features">
            <div class="container">
                <div class="row features-row">
                    <!-- Feature Box Starts -->
                    <div class="feature-box col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="download-bitcoin" src="{{ asset(('images/icons/orange/download-bitcoin.png')) }}" alt="download bitcoin">
						</span>
                        <div class="feature-box-content">
                            <h3>Register with us and set up your wallet</h3>
                            {{-- <p></p> --}}
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box two col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="add-bitcoins" src="{{ asset (('images/icons/orange/add-bitcoins.png')) }}" alt="add bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Choose investment plan and invest</h3>
                           
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box three col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="buy-sell-bitcoins" src="{{ asset (('images/icons/orange/buy-sell-bitcoins.png')) }}" alt="buy and sell bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Wait for your investment to mature and hit witdraw</h3>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                </div>
            </div>
        </section>
        <!-- Features Section Ends -->
        <!-- About Section Starts -->
        <section class="about-us">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">About <span>Us</span></h2>
                    <div class="title-head-subtitle">
                        <p>SWITZERLAND TOP CRYPTO INVESTMENT COMPANY</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img id="about-us" class="img-responsive img-about-us" src="{{ asset (('images/about-us.png')) }}" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about">WE ARE SMART WEALTH</h3>
                        <p class="about-text"> Zürich, Switzerland based and FINMA regulated
                            crypto company with Funds secured in offline wallets. 
                            Fully compliant with  IT and money laundering security standards.
                            </p>
                        
                        <a class="btn btn-primary" href="{{ route ('about-us') }}">Read More</a>
                    </div>
                    <!-- Content Ends -->
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
        <!-- Features and Video Section Starts -->
        <section class="image-block">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-8 ts-padding img-block-left">
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="strong-security" src="{{ asset (('images/icons/orange/strong-security.png')) }}" alt="strong security"/>
									</span>
                                    <h3 class="feature-title">Strong Security</h3>
                                    <p>Strong regulation, as well as <br>funds being saved in offline wallets</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="world-coverage" src="{{ asset (('images/icons/orange/world-coverage.png')) }}" alt="world coverage"/>
									</span>
                                    <h3 class="feature-title">World Coverage</h3>
                                    <p>Providing services in 99% countries<br> around all the globe</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="payment-options" src="{{ asset (('images/icons/orange/payment-options.png')) }}" alt="payment options"/>
									</span>
                                    <h3 class="feature-title">Payment Options</h3>
                                    <p>We pay using your prefered Cryptocurrency</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="mobile-app" src="{{ asset (('images/icons/orange/mobile-app.png')) }}" alt="mobile app"/>
									</span>
                                    <h3 class="feature-title">Mobile App</h3>
                                    <p>Swift withdrawal, <br> direct into your wallet</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="cost-efficiency" src="{{ asset (('images/icons/orange/cost-efficiency.png')) }}" alt="cost efficiency"/>
									</span>
                                    <h3 class="feature-title">Cost efficiency</h3>
                                    <p>We provide you zero deposit and withdrawal fee</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="high-liquidity" src="{{ asset (('images/icons/orange/high-liquidity.png')) }}" alt="high liquidity"/>
									</span>
                                    <h3 class="feature-title">High Liquidity</h3>
                                    <p>We provide you high yeld investment plans</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    <div class="col-md-4 ts-padding bg-image-1">
                        <div>
                            <div class="text-center">
                                <!-- <a class="button-video mfp-youtube" href="https://www.youtube.com/watch?v=0gv7OC9L2s8"></a> -->
                                <span class="button-video mfp-youtube" style="opacity: 0.5;">Video Disabled</span>
                            </div>
                        </div>
                    </div>
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
        <!-- Features and Video Section Ends -->
        <!-- Pricing Starts -->
        <section class="pricing">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">OUR PLANS, ALL ARE<span> 6 DAYS</span></h2>
                    <div class="title-head-subtitle">
                      
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row pricing-tables-content">
                    <div class="pricing-container">
                        <!-- Pricing Switcher Starts -->
                       
                        <!-- Pricing Switcher Ends -->
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert">
                            @foreach ($plans as $plan)
    
                             <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
    
                               
                                <ul class="pricing-wrapper">
                                    <!-- Pricing Table #1 Starts -->
                                    <li>
                                        
                                        <header class="pricing-header">
                                            <h2>{{ $plan->percentage_return }}%, daily</h2>
                                            <h2><span>Minimum Investment</span>  <span>${{ $plan->min }}</span></h2>
                                            <h2><span>Maximim Investment</span><span>${{ $plan->max }}</span></h2>
                                            <h2><span> {{$plan->referral_bonus ?? 0}}% Referral Bonus</span> </h2>
                                           <div class="price">
                                            {{-- <span class="currency"><i class="fa fa-dollar"></i></span> --}}
                                            <span class="value">{{ $plan->name }}</span>
                                        </div>
                                        </header>
                                       
                                        <footer class="pricing-footer">
                                            <a href="{{route('login') }}" class="btn btn-primary">Invest Now</a>
                                        </footer>
                                    </li>
                                    <!-- Pricing Table #1 Ends -->
                                </ul>
                            </li>
                        @endforeach
                          
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        <!-- Bitcoin Calculator Section Starts -->
        <section class="bitcoin-calculator-section">
            <div class="container">
                <div class="row">
                    <!-- Section Heading Starts -->
                    <div class="col-md-12">
                        <h2 class="title-head text-center"><span>Coin</span> Calculator</h2>
                        <p class="message text-center">Find out the current value of any coin with our easy-to-use converter</p>
                    </div>
                    <!-- Section Heading Ends -->
                    <!-- Bitcoin Calculator Form Starts -->
                    <div class="col-md-12 text-center">
                       <crypto-converter-widget amount="1" shadow="true" symbol="true" live="true" fiat="united-states-dollar" crypto="bitcoin" font-family="inherit" background-color="#f39512" decimal-places="2" border-radius="0.5rem"></crypto-converter-widget><script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js"></script>
                        <p class="info"><i></i></p>
                    </div>
                    <!-- Bitcoin Calculator Form Ends -->
                </div>
            </div>
        </section>
        <!-- Bitcoin Calculator Section Ends -->
        <!-- Team Section Starts -->
        
        <!-- Team Section Ends -->
        <!-- Quote and Chart Section Starts -->
        <section class="image-block2">
            <div class="container-fluid">
                <div class="row">
                    <!-- Quote Starts -->
                    <div class="col-md-4 img-block-quote bg-image-2">
                        <blockquote>
                            <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>
                            <footer><img src="images/ceo.jpg" alt="ceo" /> <span>Marc Smith</span> - CEO</footer>
                        </blockquote>
                    </div>
                    <!-- Quote Ends -->
                    <!-- Chart Starts -->
                    <div class="col-md-8 bg-grey-chart">
                        <div class="chart-widget dark-chart chart-1">
                            <div>
                                <div class="btcwdgt-chart" data-bw-theme="dark"></div>
                            </div>
                        </div>
						<div class="chart-widget light-chart chart-2">
                            <div>
                                <div class="btcwdgt-chart" bw-theme="light"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Ends -->
                </div>
            </div>
        </section>
        <!-- Quote and Chart Section Ends -->
        <!-- Blog Section Starts -->
        <section class="blog">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">Crypto <span>Updates</span></h2>
                    <div class="title-head-subtitle">
                        {{-- <p>Discover latest news about Bitcoin on our blog</p> --}}
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row latest-posts-content">
                    <!-- Article Starts -->
                   <!-- TradingView Widget BEGIN -->
<!-- TradingView Widget BEGIN -->
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
    {
    "feedMode": "all_symbols",
    "isTransparent": false,
    "displayMode": "regular",
    "width": "1200",
    "height": "200",
    "colorTheme": "light",
    "locale": "en"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
  <!-- TradingView Widget END -->
  <!-- TradingView Widget END -->
  <!-- TradingView Widget END -->
                </div>
				<!-- Section Content Ends -->
            </div>
        </section>
        <!-- Blog Section Ends -->
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
			<div class="call-action-all-overlay">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- Call To Action Text Starts -->
							<div class="action-text">
								<h2>Get Started Today With your investment journey</h2>
								<p class="lead">Open account for free and start investing!</p>
							</div>
							<!-- Call To Action Text Ends -->
							<!-- Call To Action Button Starts -->
							<p class="action-btn"><a class="btn btn-primary" href="{{ route ('register') }}">Register Now</a></p>
							<!-- Call To Action Button Ends -->
						</div>
					</div>
				</div>
			</div>
        </section>
        <!-- Call To Action Section Ends -->
        <!-- Footer Starts -->
@endsection