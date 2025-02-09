
import Header from "@/components/common/Header";
import Link from "next/link";
import Social from "@/components/common/Social";
import Faq from "@/components/about/Faq"
import Block from "@/components/about/Block" 
import Image from "next/image"

export const metadata = {
  title: 'Git Startup | About Us',
  description: "Grow your business with Git Startup, where we connect you with the industry's best professionals without the high salary and employment costs. Specializing in bridging the gap between ambitious businesses and top-tier talent, we ensure your company flourishes with expert support. Perfect for businesses aiming to grow efficiently and affordably.",
} 
 

const AboutUs = () => {

  return (
    <>
   
      {/* <!--
      =============================================
      Theme Default Menu
      ==============================================
      --> */}
      <Header />



      {/* <!--
			=============================================
			Feature Section Thirty Four
			============================================== 
      --> */}
      <div
        className="feedback-section-twelve position-relative mt-225 lg-mt-200 md-mt-180"
        data-aos="fade-up">
        <div className="container">
          <div className="fancy-feature-thirtyFour mt-50">
            <div className="container">
              <div className="row gx-xxl-5">
                <Block />
              </div>
            </div>
            </div>
          </div>
      </div>
      {/* <!-- /.container --> */}
      {/* <!-- /.fancy-feature-thirtyFour --> */}


      {/* <!--
			=============================================
			Feature Section Thirty Four
			============================================== 
      --> */}
      <div
        className="feedback-section-twelve position-relative"
        data-aos="fade-up">
        <div className="container">
          <div className="fancy-feature-thirtyFour mt-50">
            <div className="container">
              <div className="row gx-xxl-5">
                <Faq />
              </div>
            </div>
            </div>
          </div>
      </div>
      {/* <!-- /.container --> */}
      {/* <!-- /.fancy-feature-thirtyFour --> */}


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

export default AboutUs;
