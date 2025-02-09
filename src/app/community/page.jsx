import Link from "next/link"
import Header from "@/components/common/Header"
import Counter from "@/components/community/Counter"
import ProjectsBlock from "@/components/community/ProjectsBlock"
import Social from "@/components/common/Social"
import { getProjects } from "@/lib/data"
import Image from 'next/image'


export const metadata = {
  title: 'Git Startup | Blog Page',
  description: 'Git Startup, founded in 2019, is poised to be the Y-Combinator of the region, providing financial investment in a technical support and marketing services format. With a focus on web/mobile development and cutting-edge marketing strategies, Git Startup is dedicated to the success of every client.',
}  


const Community = async () => { 

//   const projects = await getProjects()

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
                <div className="sc-title text-uppercase"> Our Community </div>
                <h2 className="main-title font-recoleta fw-500 tx-git-color">
                    Join Our Community.
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
                        Join us at Git Startup! We're a group of experts working together to make free tools that help new businesses grow. 
                        If you know a lot or want to learn and help, you're in the right place. Together, we can make big things happen for small companies. 
                        Subscribe and start helping or getting help today!
                    </p>
                </div>

            </div>

        </div>
        {/* End .container */}
        <div className="shapes shape-one rounded-circle" />
        <div className="shapes shape-two rounded-circle" />
      </div>
      {/* /.pricing-section-three */}

      {/* 
        =============================================
        Feature Section Sixteen
        ============================================== 
        */}
      <div className="fancy-feature-sixteen position-relative pb-80  mb-150 lg-pb-50 lg-mb-100">

        {/* End container */}

        <div className="inner-wrapper">
          <div className="row gx-xxl-5">
            <ProjectsBlock />
          </div>
        </div>
        {/* /.inner-wrapper */}

      </div>



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

export default Community
