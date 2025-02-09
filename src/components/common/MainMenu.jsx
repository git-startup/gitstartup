import Link from "next/link"
import Image from "next/image"

const MainMenu = () => {
 
  return ( 
    <nav className="navbar navbar-expand-lg order-lg-2">
      <button
        className="navbar-toggler d-block d-lg-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span />
      </button>
      {/* End mobile collapse menu */}

      <div className="collapse navbar-collapse" id="navbarNav">
        <ul className="navbar-nav">
          <li className="d-flex justify-content-between d-lg-none">
            <div className="logo">
              <Link href="/" className="d-block">
                <Image src="/images/logo/gitstartup_logo.png" alt="Git Startup" width={95} height={95}/>
              </Link>
            </div> 
            <div className="pt-40">
            <button
              className="navbar-toggler d-block d-lg-none"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span />
            </button>
            </div>
          </li>
          {/* End li */}
          <li className="nav-item">
            <Link className="nav-link" href="/" role="button">
              Home
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" href="/about" role="button">
              About us
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" href="/#services" role="button">
              Services
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" href="/#experts" role="button">
              Our Experts
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" href="/pricing" role="button">
              Pricing
            </Link>
          </li>


          {/* End li (pages) */}

          {/* End li (blog) */}

          {/* End li (contact) */}
        </ul>
        {/* End ul */}

        {/* Mobile Content */}
       {/*  <div className="mobile-content d-block d-lg-none">
          <div className="d-flex flex-column align-items-center justify-content-center mt-70">
            <Link href="/" className="btn-twentyOne fw-500 tran3s">
              Contact us
            </Link>
          </div>
        </div> */}
        {/* /.mobile-content */}
      </div>
    </nav>
  );
};

export default MainMenu;
