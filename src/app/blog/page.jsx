import Link from "next/link";
import Header from "@/components/common/Header";
import Blog from "@/components/home/Blog";
import Social from "@/components/common/Social";
import { getPosts } from "@/lib/data";
import Image from 'next/image'


export const metadata = {
  title: 'Git Startup | Blog Page',
  description: 'Git Startup, founded in 2019, is poised to be the Y-Combinator of the region, providing financial investment in a technical support and marketing services format. With a focus on web/mobile development and cutting-edge marketing strategies, Git Startup is dedicated to the success of every client.',
}  


const Home = async () => { 

  const posts = await getPosts()

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
              <Blog  posts={ posts }/>
            </div>  
            {/* End .row */}

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
