import Link from "next/link"
import Header from "@/components/common/Header"
import Hero from "@/components/expert/Hero"
import ExpertContactForm from "@/components/expert/ExpertContactForm" 
import Social from "@/components/common/Social"
import Image from 'next/image'
import { getExpertDetails } from "@/lib/data"



export const generateMetadata = async ({ params }) => {
    const { id } = params;
  
    const expertDetails = await getExpertDetails(id);
  
    return {
      title: expertDetails.name,
      description: expertDetails.intro,
    };
};
 

const ExpertDetails = async ({ params }) => {

  const { id } = params 

  const expert = await getExpertDetails(id)

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
      <Hero expert={expert} />
      {/* /.hero-banner-eleven */}


       {/*
        =====================================================
            Fancy Short Banner Five
        =====================================================
        */}
      <div className="fancy-short-banner-five p-30 mt-80" id="s5">
        <div className="bg-wrapper position-relative pt-180 pb-140 lg-pt-80 lg-pb-80">
          <Image
            src="/images/shape/shape_68.svg"
            alt="shape"
            className="lazy-img shapes shape-one"
            width={50}
            height={50}
          />
       
          <div className="container">
            <div
              className="innner-content bg-white position-relative"
              data-aos="fade-up"
            > 
              <div className="row align-items-center">
                <div className="col-lg-5">
                  <h2 className="title-xl font-recoleta fw-500 tx-git-color"> 
                    Let’s
                    <span className="d-inline-block position-relative">
                    Talk
                    </span>
                  </h2>
                  <p className="text-lg mt-35 md-mt-20">
                    Contact Us now and Let's Discuss Your Next Success.
                  </p>
                </div>
                <div className="col-lg-6 ms-auto">
                  <div className="form-style-one md-mt-40">
                    <ExpertContactForm />
                  </div>
                  {/* /.form-style-one */}
                </div>
              </div>
            </div>
            {/* /.innner-content */}
          </div>
        </div>
        {/* /.bg-wrapper */}
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

export default ExpertDetails
