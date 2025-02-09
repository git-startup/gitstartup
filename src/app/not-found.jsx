import Link from "next/link"
import Image from 'next/image'

const NotFound = () => {
  return (
    <>

      {/* <!-- 
      =============================================
      Theme Default Menu
      ============================================== 	
      --> */}
     {/*  <DefaulHeader /> */}

      {/* 
			=============================================
			Error Page
			============================================== 
			*/}
      <div className="error-page-content d-flex align-items-center justify-content-center">
        <div className="container">
          <div className="mb-40">
            <Image src="/images/logo/gitstartup_logo.png" alt="Git Startup" width={150} height={150} className="m-auto"  />
          </div>
          <div className="row">
            <div className="col-xxl-6 col-lg-7 m-auto">
              <h3>Opps! 404</h3>
              <p className="me-xxl-5 ms-xxl-5 pt-15 pb-20">
                Can not find what you need ? 
              </p>
              <Link href="/" className="btn-twentyOne fw-500 tran3s">
                Back to home
              </Link>
            </div>
          </div>
        </div>
        {/* End .container */}

      </div>
      {/* /.error-page-content */}
    </>
  );
};

export default NotFound;
