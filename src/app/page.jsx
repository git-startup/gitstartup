import Link from "next/link"
import Header from "@/components/common/Header"
import OurServices from "@/components/home/OurServices"
import Hero from "@/components/home/Hero"
import Portfolio from "@/components/home/Portfolio"
import OurTeamTestimonial from "@/components/home/OurExpertsTestimonial"
import Partners from "@/components/home/Partners"
import Blog from "@/components/home/Blog"
import Social from "@/components/common/Social"
import { getPartners, getPosts, getExperts } from "@/lib/data"
import Image from 'next/image'


export const metadata = {
  title: 'Git Startup | Industry Experts at Hand',
  description: "Grow your business with Git Startup, where we connect you with the industry's best professionals without the high salary and employment costs. Specializing in bridging the gap between ambitious businesses and top-tier talent, we ensure your company flourishes with expert support. Perfect for businesses aiming to grow efficiently and affordably.",
} 


const Home = async () => {

  const partners = await getPartners()
  const posts = await getPosts()
  const experts = await getExperts()

  return (
    <>
      {/* <!--
        =============================================
        Theme Default Menu
        ==============================================
        --> */}
      <Header />


      {/*
        =============================================
        Theme Hero Banner
        ============================================== 
        */}
      <Hero />
      {/* /.hero-banner-eleven */}


      {/* <!-- 
			=============================================
				Services Section Thirty Four
			============================================== 
			--> */}
      <div className="fancy-feature-thirtyFour mt-50" id="services">
        <div className="container">
          <div className="row gx-xxl-5">
            <OurServices />
          </div>
        </div>
      </div>
      {/* <!-- /.container --> */}
      {/* <!-- /.fancy-feature-thirtyFour --> */}


      {/*
        =====================================================
        Portfolio Gallery Two
        =====================================================
        */}
      <div className="portfolio-gallery-two pt-200 lg-pt-80">
        <div className="container">
          <div className="wrapper">
            <div id="isotop-gallery-wrapper">
              <Portfolio />
            </div>
            {/* /#isotop-gallery-wrapper */}
          </div>
          {/* /.wrapper */}
        </div>
      </div>
      {/* /.portfolio-gallery-two */}


      {/*=====================================================
				Feedback Section Eleven
			=====================================================
			*/}
      <div
        className="feedback-section-eleven position-relative mt-110 sm-mt-80"
        data-aos="fade-up"
        id="experts"
      >
        <div className="container">
          <div className="title-style-one text-center mb-50 lg-mb-20">
            <h2 className="main-title font-recoleta fw-500 tx-git-color">Our Talented Experts.</h2>
          </div>
        </div>
        <div className="inner-content">
          <div className="feedback_slider_seven">
            <OurTeamTestimonial testimonial={ experts }/>
          </div>

          {/* /.slider-wrapper */}
        </div>
        {/* /.inner-content */}
      </div>
      {/* /.feedback-section-eleven */}



      {/*
			=============================================
				Partner Section Six
			============================================== 
			*/}
      <div className="partner-section-six mt-140 lg-mt-80" data-aso="fade-up">
        <div className="container">
          <div className="top-header">
            <div className="d-flex align-items-center justify-content-between">
              <span className="lines" />
              <div className="title text-uppercase tx-git-color text-center">
                Our Clients and Partners
              </div>
              <span className="lines" />
            </div>
            {/* End d-flex */}
 
            <div className="partner_slider_one mt-65 lg-mt-40">
              <Partners partners={partners}/>
            </div>
            {/* End partner_slide */}
          </div>
        </div>
      </div>
      {/* /.partner-section-six */}



      {/*
			=====================================================
				Blog Section Five
			=====================================================
			*/}
      <div className="blog-section-five mt-190 lg-mt-120">
        <div className="container">
          <div className="position-relative">
            <div className="row">
              <div className="col-xl-6">
                <div className="title-style-five text-center text-md-start mb-30 md-mb-10">
                  <h2 className="main-title font-recoleta fw-500 tx-git-color">
                    Our Blog
                  </h2>
                </div>
              </div>
            </div>
            {/* End .row */}

            <div className="row gx-xxl-5">
              <Blog posts={ posts } numbOfPosts={ 4 } />
            </div>
            {/* End .row */}

            <div className="btn-holder text-center">
              <div className="btn-eighteen position-relative d-inline-block tx-git-color sm-mt-60">
                <Link href="/blog" className="fw-500 tran3s">
                  Check all articals <i className="fa-solid fa-angle-right" />
                </Link>
              </div>
            </div>
            {/* End btn-holder */}
          </div>
          {/* End position-relative */}
        </div>
      </div>
      {/* /.blog-section-five */}



      {/*
			=====================================================
				Fancy Short Banner Fourteen
			=====================================================
			*/}
      <div
        className="fancy-short-banner-fourteen mt-200 lg-mt-140 "
        data-aos="fade-up"
      >
        <div className="container">
          <div className="wrapper pb-90 lg-pb-40">
            <div className="row align-items-center">
              <div className="col-lg-8 col-md-9">
                <h2 className="title font-recoleta fw-normal tx-git-color position-relative m0 text-center text-md-start sm-pb-30">
                  Any <span> Issue, Idea or Project</span> ? Let’s Talk.
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
  )
}

export default Home
