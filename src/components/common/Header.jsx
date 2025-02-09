"use client"

import { useEffect, useState } from "react"
import Link from "next/link";
import ModalContent from "../home/ModalContent"
import MainMenu from "./MainMenu"
import Image from "next/image"

const Header = () => {
  const [navbar, setNavbar] = useState(false);

  const changeBackground = () => {
    if (window.scrollY >= 10) {
      setNavbar(true);
    } else {
      setNavbar(false);
    }
  };

  useEffect(() => {
    window.addEventListener("scroll", changeBackground);
    return () => {
      window.removeEventListener("scroll", changeBackground);
    };
  }, []);

  return (
    <>
      <header
        className={`theme-main-menu sticky-menu ${navbar ? "fixed" : ""}`}
      >
        <div className="inner-content position-relative">
          <div className="d-flex align-items-center justify-content-between">
            <div className="logo order-lg-0">
              <Link href="/" className="d-block">
                <Image src="/images/logo/gitstartup_logo.png" alt="Git Startup" width={95} height={95} />
              </Link>
            </div>

            <MainMenu />

            <div className="right-widget">
              <button
                className="contact-btn-four fw-500"
                data-bs-toggle="modal"
                data-bs-target="#contactModal"
              > 
                <em>Book a </em> <span>Call</span>
                <i className="bi bi-arrow-up-right" />
              </button>
            </div>
            {/* /.right-widget */}
          </div>
        </div>
        {/* /.inner-content */}
      </header>

      {/*
			=====================================================
				Modal
			=====================================================
			*/}
      {/* Modal */}
      <div
        className="modal fade"
        id="contactModal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabIndex={-1}
        aria-hidden="true"
      >
        <div className="modal-dialog modal-lg modal-dialog-centered">
          <ModalContent />
          {/* /.modal-content */}
        </div>
        {/* /.modal-dialog */}
      </div>
    </>
  );
};

export default Header;
