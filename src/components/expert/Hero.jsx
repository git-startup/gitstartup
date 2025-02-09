import Image from "next/image"
import ContentBody from "./ContentBody"

 
const Hero = ({expert}) => {
  const images = [
    {
      src: "/images/shape/shape_56.svg",
      alt: "media",
      className: "lazy-img shapes shape-one",
    },
    {
      src: "/images/shape/shape_57.svg",
      alt: "media",
      className: "lazy-img shapes shape-two",
    },
    {
      src: "/images/shape/shape_58.svg",
      alt: "media",
      className: "lazy-img shapes shape-three",
    },
    {
      src: "/images/shape/shape_59.svg",
      alt: "media",
      className: "lazy-img shapes shape-four",
    },
  ];

  const renderImages = () => {
    return images.map((image, index) => (
      <Image
        key={index}
        src={image.src}
        alt={image.alt}
        className={image.className}
        width={15}
        height={15}
      />
    ));
  };

  return (
    <div className="hero-banner-four position-relative" id="s1">
      <div className="container">
        <Image
          src={`https://gitstartup.net/upload/experts/${expert.picture}`}
          alt={expert.name}
          className="lazy-img avatar-img m-auto rounded-circle"
          data-aos="fade-up"
          width={200}
          height={200}
        />
        <div
          className="profile-name tx-git-color text-center text-lg mt-35 mb-20"
          data-aos="fade-up"
          data-aos-delay="200"
        >
          Hi, I’m <span className="fw-500">{ expert.name }</span>
        </div>
        <div className="row">
          <div
            className="col-xxl-11 col-lg-10 col-md-8 m-auto text-center"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <h1 className="hero-heading fw-500 font-recoleta tx-git-color mb-65 lg-mb-40">
              { expert.position }
            </h1>
          </div>
          <div
            className="col-lg-12 col-md-8 m-auto "
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <p className="text-lg pe-xxl-4 ps-xxl-4 mb-75 lg-mb-50">
              <ContentBody expert={expert} />
            </p>
          </div>
        </div>
      </div>
      {renderImages()}
    </div>
  );
};

export default Hero;
