
const BannerPost = () => {
  return (
    <div
      className="sidebar-banner-add"
      style={{ backgroundImage: "url(/images/blog/launch-min.jpg)" }}
    >
      <div className="banner-content">
        <h4>
          Your Technical Partner In Success <br />
        </h4>
        <p>Talk to us for support</p>
        <a href="#" data-bs-toggle="modal"
                data-bs-target="#contactModal" className="btn-twentyOne fw-500 tran3s">
          Book a Call
        </a>
      </div>
    </div>
  );
};

export default BannerPost;
