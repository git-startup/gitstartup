"use client";
 
import React from "react";
import Slider from "react-slick";


const FeedbackTestimonial = ({ testimonials }) => {

  const settings = {
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [ 
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };


  return (
    <Slider {...settings} arrows={false}>
      {testimonials.map((testimonial, index) => (
        <div key={index} className="item">
          <div className="feedback-block-twelve">
            <p className="tx-git-color mt-35 mb-40 pe-xxl-4">
              { testimonial.feedback }  
            </p>          
            <h6 className="tx-git-color fs-20"> 
              {testimonial.name},
              <span className="fw-normal opacity-50">
                &nbsp; {testimonial.address}
              </span>
            </h6>
          </div>
          {/* /.feedback-block-twelve */}
        </div>
      ))}
    </Slider>
  );
};

export default FeedbackTestimonial;

