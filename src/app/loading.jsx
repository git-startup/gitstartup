"use client"

import { TailSpin } from "react-loader-spinner";

const Loading = () => {
  return (
    <div className="loaderContainer" >
      <div className="loader">
        <TailSpin color="#F98F9A" radius={"8px"} />
      </div>

    </div>
  )
}

export default Loading 