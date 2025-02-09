


import Link from "next/link";
import Header from "@/components/common/Header";
import Pricing from "@/components/pricing/Pricing";
import Social from "@/components/common/Social";
import Image from 'next/image'
import Counter from "@/components/pricing/Counter";


export const metadata = {
  title: 'Git Startup | Blog Page',
  description: 'Git Startup, founded in 2019, is poised to be the Y-Combinator of the region, providing financial investment in a technical support and marketing services format. With a focus on web/mobile development and cutting-edge marketing strategies, Git Startup is dedicated to the success of every client.',
}  


const Home = async () => { 


  return (
    <>
      {/* <!--
        =============================================
        Theme Default Menu
        ==============================================
        --> */}
      <Header />


     {/*
			=====================================================
			Pricing Section Three
			=====================================================
			*/}
      <div className="pricing-section-three position-relative mt-225 mb-80 lg-mt-140 lg-mb-80">
        <div className="container">
              <div
                className="title-style-one text-center mb-70 lg-mb-40"
                data-aos="fade-up"
              >
                <div className="sc-title text-uppercase"> Salaries Per / Month </div>
                <h2 className="main-title font-recoleta fw-500 tx-git-color">
                  Expertes Salaries in UAE
                </h2>
                
                <div className="wrapper lg-mt-10 mb-60">
                    <div className="container">
                        <div className="row justify-content-center">
                            <Counter />
                        </div>
                    </div>
                </div>
              </div>

            <div className="row">
                <div
                    className="col-lg-9 col-md-8 m-auto text-center"
                    data-aos="fade-up"
                >
                    <p className="text-lg pe-xxl-4 ps-xxl-4 mb-75 lg-mb-50">
                      <span className="fw-500 tx-git-color font-recoleta "> Luckily You Don't have to pay for all this, </span>  Get the best people to work for you without paying big salaries every month. Our Pricing Model let you pay less and still get great work done, without the hassle of long hiring steps or expensive salaries.
                    </p>
                </div>
            </div>
                
            <Pricing />
        </div>
        {/* End .container */}
        <div className="shapes shape-one rounded-circle" />
        <div className="shapes shape-two rounded-circle" />
      </div>
      {/* /.pricing-section-three */}


      {/*
        =====================================================
            Fancy Short Banner Fourteen
        =====================================================
        */}
      <div
        className="fancy-short-banner-fourteen mt-80 lg-mt-80"
        data-aos="fade-up"
      >
        <div className="container">
          <div className="wrapper pb-90 lg-pb-40">
            <div className="row align-items-center">
              <div className="col-lg-8 col-md-9">
                <h2 className="title font-recoleta fw-normal tx-git-color position-relative m0 text-center text-md-start sm-pb-30">
                  Any <span> Issue, Idea or Project</span> ? Let’s Chat.
                </h2>
              </div>
              <div className="col-lg-4 col-md-3">
                <a
                  href="#"
                  className="btn-twentyThree d-flex align-items-center justify-content-center m-auto me-md-0 ms-md-auto"
                  data-bs-toggle="modal"
                  data-bs-target="#contactModal"
                >
                  <Image 
                    src="/images/icon/icon_115.svg" 
                    alt="icon"
                    width={60}
                    height={60}
                  /> 
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      {/* /.fancy-short-banner-fourteen */}

      {/*
			=====================================================
				Footer
			=====================================================
			*/}
      <div className="footer-style-four position-relative">
        <div className="container">
          <div className="row align-items-center">
            <div className="col-lg-4 mb-30 order-lg-0">
              <div className="logo d-flex justify-content-center justify-content-lg-start">
                <Link href="/">
                  <Image src="/images/logo/gitstartup_logo.png" alt="Git Startup" width={77} height={77} />
                </Link>
              </div>
            </div>
            {/* End .col-lg-4 */}

            <div className="col-lg-4 mb-30 d-flex justify-content-center justify-content-lg-end order-lg-3">
              <a
                href="mailto:info@gitstartup.com"
                className="mail d-flex align-items-center"
              >
                <span className="icon d-flex align-items-center justify-content-center rounded-circle">
                  <i className="far fa-envelope" />
                </span>{" "}
                <span>info@gitstartup.com</span>
              </a>
            </div>
            {/* End .col-lg-4 */}

            <div className="col-lg-4 mb-30 order-lg-2">
              <Social />
            </div>
            {/* End .col-lg-4 */}
          </div>
        </div>
      </div>
      {/* /.footer-style-four */}
    </>
  );
};

export default Home;
