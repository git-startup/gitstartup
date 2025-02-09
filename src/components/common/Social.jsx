import React from "react";

const socialMedia = [
  {
    iconClass: "fab fa-facebook", 
    link: "https://www.facebook.com/gitstartup/",
  },
  {
    iconClass: "fab fa-x",
    link: "https://twitter.com/GitStartups",
  },
  {
    iconClass: "fab fa-linkedin",
    link: "https://www.linkedin.com/company/gitstartup/",
  },
  {
    iconClass: "fab fa-instagram",
    link: "https://www.instagram.com/gitstartup/",
  },
  {
    iconClass: "fab fa-youtube", 
    link: "https://www.youtube.com/@gitstartup",
  },
];

const Social = () => {
  return (
    <ul className="d-flex justify-content-center social-icon style-none">
      {socialMedia.map((item, index) => (
        <li key={index}>
          <a href={item.link} target="_blank">
            <i className={item.iconClass} />
          </a>
        </li>
      ))}
    </ul>
  );
};

export default Social;
