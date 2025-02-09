"use client"

import { useFormState } from "react-dom"
import { sendMessage } from "@/lib/action"
import { useEffect } from "react"
import Link from "next/link"

const ExpertContactForm = () => {
  
  const [state, formAction] = useFormState(sendMessage, undefined); 


  useEffect(() => {
    document.getElementById("expertMessageForm").reset();
  }, [state?.success]);

  return (
    <form action={formAction} id="expertMessageForm">
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
            placeholder="Your Company Name*"
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
            Choose a Plan* <Link 
            className="tx-git-secoundary-color" 
            href="/pricing"> Know more ? 
            </Link> 
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
          className="btn-twentyOne w-100 fw-500 tran3s text-uppercase text-white"
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
  );
}

export default ExpertContactForm
