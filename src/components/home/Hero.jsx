import Link from "next/link";
import Image from "next/image"

const Hero = () => {
  const socialLinks = [
    { label: "Fb.", url: "https://www.facebook.com/gitstartup/" },
    { label: "X.", url: "https://twitter.com/GitStartups" }, 
    { label: "Insta.", url: "https://www.instagram.com/gitstartup/" }, 
    { label: "Ln.", url: "https://www.linkedin.com/in/gitstartup" },
  ];

  return (
    <div className="hero-banner-eleven mt-225 lg-mt-200 md-mt-180">
      <div className="banner-intro position-relative">
        <div className="scroll-bar" />
        <div className="social-elemnet">
          <ul className="style-none d-flex align-items-center">
            {socialLinks.map((link, index) => (
              <li key={index}>
                <a href={link.url} target="_blank" className="tran3s">
                  {link.label}
                </a>
              </li>
            ))}
          </ul>
        </div>
        {/* End social-element */}

        <div className="container">
          <div className="text-wrapper pb-60 position-relative">
            <h1
              className="hero-heading font-recoleta fw-light mb-30 lg-mb-50 pe-xxl-4"
              data-aos="fade-up"
            >
              <span className="line-one">Technical </span> Support for
              your Buisness  <span className="line-two"> Idea. </span> 
            </h1>

            <div className="d-sm-flex align-items-center justify-content-between">
              <div className="d-inline-block">
                <div className="ct-text fs-15 text-uppercase">
                  Contact Us
                </div>
                <div className="mt-5">
                  <a
                    href="mailto:hey@janodesign.com"
                    className="mail-info tran3s"
                  >
                    info@gitstartup.com
                  </a>
                </div> 
              </div>
              <Link
                href="/about"
                className="btn-twentyThree d-flex align-items-center justify-content-center xs-mt-30"
              >
                <Image src="/images/icon/icon_115.svg" alt="icon" width={60} height={60} />
              </Link>
            </div> 

            <Image
              src="/images/shape/shape-142.svg"
              alt="shape"
              className="shapes lazy-img shape-one"
              width={122}
              height={122}
            />
          </div>
        </div>
      </div>
      {/* /.banner-intro */}
    </div>
  );
};

export default Hero;
