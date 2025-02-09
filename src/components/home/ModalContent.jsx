"use client";

import { useFormState } from "react-dom"
import { sendMessage } from "@/lib/action"
import { useEffect, useRef } from "react"

 
const ModalContent = () => {

  const [state, formAction] = useFormState(sendMessage, undefined); 

  const modalClose = useRef(null); 

  useEffect(() => {
    document.getElementById("messageForm").reset();
    if(state?.success){
      setTimeout(() => {
        modalClose.current.click()
      }, 2000);
    }
  }, [state?.success]);

  return (
    <div className="modal-content">
      <div className="modal-header">
        <button
          ref={modalClose}
          type="button"
          className="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        />
      </div>

      <div className="modal-body p0">
        <div className="container">
          <div className="row">
            <div className="col-lg-8 col-sm-11 m-auto">
              <div className="form-style-one pt-50 pb-70 lg-pt-30 lg-pb-30">
                <form action={formAction} id="messageForm"> 
                  <div className="messages" />
                  <div className="row controls">
                    <div className="col-12">
                      <div className="input-group-meta form-group mb-30">
                        <input
                          type="text"
                          placeholder="Your Name*"
                          name="name"
                          required="required"
                          data-error="Name is required."
                        />
                        <div className="help-block with-errors" />
                      </div>
                    </div>
                    {/* End .col-12 */}

                    <div className="col-12">
                      <div className="input-group-meta form-group mb-30">
                        <input
                          type="text"
                          placeholder="Your Company*"
                          name="company_name"
                          required="required"
                          data-error="company name is required."
                        />
                        <div className="help-block with-errors" />
                      </div>
                    </div>
                    {/* End .col-12 */}

                    <div className="col-12">
                      <div className="input-group-meta form-group mb-50">
                        <input
                          type="email"
                          placeholder="Email Address*"
                          name="email"
                          required="required"
                          data-error="Valid email is required."
                        />
                        <div className="help-block with-errors" />
                      </div>
                    </div>
                    {/* End .col-12 */}

                    <div className="col-12">
                      <div className="input-group-meta form-group mb-50">
                        <input
                          type="tel"
                          placeholder="Phone Number*"
                          name="phone"
                          required="required"
                          data-error="Valid phone number is required."
                        />
                        <div className="help-block with-errors" />
                      </div>
                    </div>
                    {/* End .col-12 */}

                    <div className="col-12">
                      <div className="input-group-meta form-group mb-50">
                        <label htmlFor="plan">
                          Choose a Plan* 
                        </label> 
                        <select 
                          id="plan"
                          name="plan" 
                          required="required"
                          data-error="Valid phone number is required."
                          >
                            <option value="other"></option>
                            <option value="Technical Consultation"> Technical Consultation </option>
                            <option value="Project Based">Project Based</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                          </select>
                        <div className="help-block with-errors" />
                      </div>
                    </div>
                    {/* End .col-12 */}

                    <div className="col-12">
                      <div className="input-group-meta form-group mb-30">
                        <textarea
                          placeholder="How We Can Help You*"
                          name="message"
                          required="required"
                          data-error="Please,leave us a message."
                          defaultValue={""}
                        />
                        <div className="help-block with-errors" />
                      </div>
                    </div>
                    {/* End .col-12 */}

                    <div className="col-12">
                      <button
                        disabled={state?.success}
                        type="submit"
                        className="btn-twentyOne fw-500 tran3s d-block"
                      >
                        Send Message
                      </button>
                      {state?.error && <div className="alert alert-danger mt-4">{state?.error}</div>}
                      {state?.success && 
                        <div className="alert alert-success mt-4">
                          Thanks For Contact Us, Well Get Back to You Soon &#128519;
                        </div>
                      }
                    </div>
                    {/* End .col-12 */}
                  </div>
                </form>
              </div>
              {/* /.form-style-one */}
            </div>
          </div>
        </div>
      </div> 
    </div>
  );
};

export default ModalContent;
