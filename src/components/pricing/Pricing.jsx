import Link from "next/link";

const Pricing = () => {
  const plans = [
    {
      icon: "/images/icon/icon_56.svg",
      plan: "Technical Consultation",
      features: [
        "Related to Website's",
        "Related to Marketing",
        "Related to Branding and Social Media Design's",
      ],
      price: "975 AED",
      duration: "One Time",
      custom: '',
      className: "pr-column pr-one",
    },
    {
      icon: "/images/icon/icon_56.svg",
      plan: "Project Based",
      features: [
        "Functional Website",
        "Marketing Campign",
        "Branding and Social Media Design's",
        "Limated Change's"
      ],
      price: "5,750 AED",
      duration: "One Time",
      custom: 'This plan can be changed based on your needs.',
      className: "pr-column ",
    },
    {
      icon: "/images/icon/icon_57.svg",
      plan: "Part Time",
      features: [
        "Functional Website",
        "Functional Mobile App",
        "Marketing Campign's",
        "Branding and Social Media Design's",
        "Ulimated Change's",
        "Part-Time Daily"
      ],
      price: "14,750 AED",
      duration: "Monthly",
      custom: 'This plan can be changed based on your needs.',
      className: "pr-column pr-two",
    },
    {
      icon: "/images/icon/icon_58.svg",
      plan: "Full Time",
      features: [
        "Functional Website",
        "Functional Mobile App",
        "Marketing Campign's",
        "Branding and Social Media Design's",
        "Ulimated Change's",
        "Ulimated Technical Support",
        "Full-Time Daily",
      ],
      price: "39,750 AED",
      duration: "Monthly",
      custom: 'This plan can be changed based on your needs.',
      className: "pr-column pr-two",
    },
  ];


  return (
    <div data-aos="fade-up">
      <div className="pricing-table-area-three mt-20  wow fadeInUp">
        <div className="tab-content">
          <div className="tab-pane show active" id="month">
            <div className="row gx-0 align-items-center">
              {plans.map((plan, index) => (
                <div className="col-lg-3 col-sm-6 mt-20" key={index}>
                  <div className={`pr-column ${plan.className}`}>
                    <div className="plan tx-git-color">{plan.plan}</div>
                    <div className="pr-body">
                      <ul className="style-none text-start">
                        {plan.features.map((feature, index) => (
                          <li key={index}>{feature}</li>
                        ))}
                      </ul>
                    </div>
                    <div className="pr-footer pt-45 lg-pt-30">
                      <div className="">
                        { plan.duration && <span className="p-1 text-white" 
                          style={{ borderRadius: 25, fontSize: 12, backgroundColor: "#F98F9A"}}
                        >
                          { plan.duration }
                        </span>
                        }
                        <p className="price tx-git-color mb-30">{plan.price} </p>
                      </div>
                      <p className="fw-500 font-recoleta"> { plan.custom } </p>
                      <Link href="#" 
                        data-bs-toggle="modal" 
                        data-bs-target="#contactModal" 
                        className="btn-twelve fw-500 tran3s"
                      >
                        Contact Us
                      </Link>
                    </div>
                  </div>
                </div>
              ))}
            </div>
            {/* /.row */}
          </div>
          {/* /.tab-pane */}
        </div>
      </div>
    </div>
  );
};

export default Pricing;
