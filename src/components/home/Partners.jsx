"use client";

import React from "react";
import Slider from "react-slick";
import Image from "next/image"
import Link from "next/link"


const Partners = ({ partners }) => {

  const settings = {
    autoplay: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };

  return (
    <Slider {...settings} arrows={false}>
      {partners.map((partner) => (
        <div className="item" key={partner.id}>
          <div className="icon d-flex align-items-center justify-content-center">
            <Link href="#" target="_blank">
              <Image
                src={`https://gitstartup.net/upload/partners/${partner.logo}`}
                alt={partner.name}
                width={100} 
                height={50}
                style={{ objectFit: 'contain', }}
              />
            </Link>
          </div>
        </div>
      ))}
    </Slider>
  );
};

export default Partners;
