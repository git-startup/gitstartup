import Image from "next/image";
import Link from "next/link";

const ProjectsBlock = () => {
  const projects = [
    {
      imgSrc: "/images/media/img_30.jpg",
      progress: "42",
      ribbonBg: "#FF3F64",
      name: "Education for all",
      description:
        "Lorem ipsum dolor consectetur adipisci. Vivamus in magna tellus fringilla eleifend.",
      aosDelay: "100",
    },
    {
      imgSrc: "/images/media/img_31.jpg",
      progress: "60",
      ribbonBg: "#FFBA3C",
      name: "Feed African child",
      description:
        "Lorem ipsum dolor consectetur adipisci. Vivamus in magna tellus fringilla eleifend.",
      aosDelay: "200",
    }
  ];

  return (
    <>
      {projects.map((project, index) => (
        <div
          className="col-lg-3 col-sm-6"
          data-aos="fade-up"
          data-aos-delay={project.aosDelay}
          key={index}
        >
          <Link href="#">
          <div className="card-style-eight mt-40 ">
            <div className="img-meta position-relative">
              <Image
                width={364}
                height={282}
                src={project.imgSrc}
                alt=""
                className="lazy-img w-100"
              />
              <div className="donation-goal d-flex align-items-center justify-content-between position-absolute">
                <div className="fw-500 text-white fs-20">
                  Progress: {project.progress}%
                </div>
              </div>
              <div
                className="ribbon position-absolute"
                style={{ background: project.ribbonBg, width: `${project.progress}%` }}
              />
            </div>
            <div className="text-meta pt-40 pb-25 ps-2 pe-2 pe-xl-4 ps-xl-4">
              <h4 className="mb-5">{project.name}</h4>
              <p className="mb-40">{project.description}</p>
              <Link href="#" className="btn-ten fs-16 fw-500 position-relative">
                Learn More <i className="fa-solid fa-angle-right" />
              </Link>
            </div>
            {/* /.text-meta */}
          </div>
          </Link>
          {/* /.card-style-eight */}
        </div>
      ))}
    </>
  );
};

export default ProjectsBlock
