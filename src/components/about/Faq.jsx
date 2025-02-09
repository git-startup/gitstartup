const accordionItems = [
  {
    id: 1,
    title: "About Git Startup",
    content:
      "We connect businesses with the best professionals in the industry, without the need for high salaries or employment costs. This makes it easier and cheaper for businesses to expand. We specialize in bringing together ambitious companies and top experts, making sure your business doesn't just grow but does really well. We focus on new ideas, keeping costs down, and helping businesses grow in a way that lasts. Git Startup is the perfect choice for businesses that want to stand out and do well in a competitive market.",
  },
  {
    id: 2,
    title: "We Understand How Startups Work",
    content:
    "At Git Startup, we know a lot about the special challenges startups face. Our team has a lot of experience in the tech world and understands that startups grow quickly and in ways that can't always be predicted. We believe that being agile, adaptable, and innovative is key for a startup to do well. Our services are designed to help you strengthen these aspects in your business. When you work with us, you get more than just tech skills. You get a supportive partner who is dedicated to helping your startup grow. We make it easier for you to handle tech challenges and build a strong base for your business to grow and expand.",
  },
  {
    id: 3,
    title: "More than Agency, We're Partner",
    content:
    "At Git Startup, we're more than just an agency. We're partners who help you innovate and grow. We do more than just help with technology. We really get to know your business, what you want to achieve, and the challenges you face. Our team of experts is here to support you at every step, from the first ideas to the final stages of making your project a reality. We don't just provide solutions; we build strong relationships. We make sure your startup has a solid technical base to succeed in today's competitive world. Choosing Git Startup means you get more than just services; you get a partner who cares about your success.",
  },
  {
    id: 4,
    title: "What services can we offer?",
    content:
      "At Git Startups, we help new businesses with their tech needs. We connect them with skilled people and offer many services to help them grow and be seen online. Our skills include making websites that are easy to use and look good, developing mobile apps for both iPhones and Android phones, and creating advanced 3D visuals. We're also good at managing social media to build a strong online image, doing digital marketing to reach the right people, writing interesting stories, and improving website content to get more attention online. We offer a wide range of services to meet the many tech needs of today's new businesses.",
  },
  {
    id: 5,
    title: "Let's bring your Idea's to the world ",
    content:
      "Our expert team is here to turn your ideas into digital success. We'll help your ideas stand out and do well in the competitive business world. If you want to share your ideas with the world and need a dependable, skilled, and excited tech partner, contact us. Let's work together to make your business dreams come true.",
  },
 
];

const Faq = () => {
  return (
    <div className="accordion accordion-style-two md-mt-60" id="accordionOne">
      {accordionItems.map((item) => (
        <div className="accordion-item" key={item.id}>
          <div className="accordion-header" id={`heading${item.id}`}>
            <button
              className={`accordion-button ${item.id === 2 ? "" : "collapsed"}`}
              type="button"
              data-bs-toggle="collapse"
              data-bs-target={`#collapse${item.id}`}
              aria-expanded={item.id === 1 ? "true" : "false"}
              aria-controls={`collapse${item.id}`}
            >
              {item.title}
            </button>
          </div>
          <div
            id={`collapse${item.id}`}
            className={`accordion-collapse collapse${
              item.id === 1 ? " show" : ""
            }`}
            aria-labelledby={`heading${item.id}`}
            data-bs-parent="#accordionOne"
          >
            <div className="accordion-body">
              <p>{item.content}</p>
            </div>
          </div>
        </div>
      ))}
    </div>
  );
};

export default Faq;
