import Image from "next/image"

const Block = () => {
  return (
    <>
      <div className="row align-items-end" data-aos="fade-up">
        <div className="col-md-5 col-sm-4">
          <Image
            src="/images/shape/shape-136.svg" 
            alt="shape"
            className="lazy-img d-none d-sm-inline-block"
            width={100}
            height={100}
          />
        </div>
        <div className="col-md-7 col-sm-8 wow fadeInDown"> 
          <div className="block-wrapper block-one"> 
            <h3 style={{ color: "#7AABEE" }}>Web & Mobile Developers Expertise.</h3>
            <p>
              A team of creative and talented developers, dedicated to turning your ideas into action,
              enabling your customers to enjoy a seamless and powerful browsing experience in your web or mobile application.
            </p>
          </div>
          {/* /.block-wrapper */}
        </div>
      </div>
      {/* End .row */}

      <div className="row gx-xxl-5" data-aos="fade-down">
        <div className="col-sm-7 wow fadeInDown">
          <div className="block-wrapper block-two position-relative mt-50 sm-mt-30">
            <h3 style={{ color: "#F98F9B" }}>
              <span> UAE Best Digital Marketing Expertise.</span>
            </h3>
            <p>
            Having a strong brand can lead to dramatic business growth. Our expertise will assist you in defining solid brand guidelines,
            developing a compelling social media strategy, and working with you on a daily basis to expand your online audience and convert them into loyal customers.
            </p>
            <Image
              src="/images/shape/shape-138.svg"
              alt="sahpe"
              className="lazy-img shapes shape-one"
              width={100}
              height={100}
            />
          </div>
          {/* /.block-wrapper */}
        </div>
        {/* End .col */}

        <div className="col-sm-5 wow fadeInUp">
          <div className="block-wrapper block-three mt-50 sm-mt-30">
            <h3 style={{ color: "#4B426E" }}>
              <span> Talented Graphics Designers.</span> 
            </h3>
            <p>
              A dynamic group of creative professionals committed to elevating your business's visual impact. 
              Each designer brings a unique blend of creativity, skill, and experience, ensuring that your business’s message is not just seen, but felt and remembered. 
            </p>
          </div> 
          {/* /.block-wrapper */}
          <Image
            src="/images/shape/shape-137.svg"
            alt="shape"
            className="lazy-img mt-30 ms-auto me-auto d-none d-sm-inline-block"
            width={100}
            height={100}
          />
        </div>




        <div className="col-sm-8 wow fadeInUp">
          <div className="block-wrapper block-three mt-50 sm-mt-30">
            <h3 style={{ color: "#7AABEE" }}>
              <span>24/7 Technical Support.</span> 
            </h3>
            <p>
            Focus 100% on your business and leave all the technical issues to us.
            With a team of experts who have spent decades resolving problems and assisting others, we can be at your service 24/7.
            </p>
          </div> 
          {/* /.block-wrapper */}
          <Image
            src="/images/shape/shape-137.svg"
            alt="shape"
            className="lazy-img mt-30 ms-auto me-auto d-none d-sm-inline-block"
            width={100}
            height={100}
          />
        </div>


        <div className="row align-items-end" data-aos="fade-up">
          <div className="col-md-5 col-sm-4">
            <Image
              src="/images/shape/shape-136.svg" 
              alt="shape"
              className="lazy-img d-none d-sm-inline-block"
              width={100}
              height={100}
            />
          </div>
          <div className="col-md-7 col-sm-8 wow fadeInDown"> 
            <div className="block-wrapper block-one"> 
              <h3 style={{ color: "#F98F9B" }}>On Call Business Consultation.</h3>
              <p>
                At Git Startup, we recognize the unique challenges and immediate needs that entrepreneurs and businesses face in today's dynamic environment. 
                That's why we're proud to offer our On Call Business Consultation service, a dedicated solution for those seeking prompt, professional advice. 
                Whether you're grappling with strategic decisions, operational issues, or technological challenges, our team of seasoned experts is just a call away. Tailored to provide flexible, real-time assistance, our service ensures that you have access to insightful guidance and practical solutions, whenever and wherever you need them. With Git Startup's On Call Business Consultation, you're never alone on your business journey.
              </p>
            </div>
            {/* /.block-wrapper */}
          </div>
        </div>
        {/* End .row */}

      </div>
    </>
  );
};

export default Block
