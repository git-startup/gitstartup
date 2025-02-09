"use client"

import Slider from "react-slick"
import Image from "next/image"
import Link from "next/link"

const OurExpertsTestimonial = ({ testimonial }) => { 

  var settings = {
    dots: true,
    infinite: true,
    autoplay: false,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        },
      },

      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 1,
          dots: true,
        },
      },
    ],
  };

  return (
    <>
      <Slider {...settings} arrows={false}>
        {testimonial.map((item) => (
          <div className="item" key={item.id}>
            <Link href={`/expert/${item.id}`}>
              <div className="feedback-block-eleven">
                <div className="top-header d-flex align-items-center justify-content-between">
                  <div>
                      <h3 className="tx-git-color m0">{item.name}</h3>
                    <div className="cost fw-500 tx-git-color fs-20 pt-20">
                      <span className="opacity-50 fw-normal">{item.position.substring(0, 30)} ...</span>
                    </div>
                    <ul className="style-none d-flex rating pt-15">
                      {Array.from({ length: 5 }).map((_, index) => (
                        <li key={index}>
                          <i className="bi bi-star-fill" />
                        </li>
                      ))}
                    </ul>
                  </div>
                  <Image
                    width={100}
                    height={100}
                    alt="testimonial avatar"
                    src={`https://gitstartup.net/upload/experts/${item.picture}`}
                    className="rounded-circle"
                  />
                </div>
                <p className="tx-git-color">{item.intro.substring(0, 80)} ...</p>
              </div>
            </Link>
          </div>
        ))}
      </Slider>
    </>
  );
};

export default OurExpertsTestimonial;
