"use client"

import { InView } from "react-intersection-observer";

const counters = [
  {
    count: "14 K+", 
    suffix: "AED",
    color: "#F98F9B",
    position: "Senior Web/Mobile Developer",
    delay: 0,
  },
  {
    count: "15 K+",
    suffix: "AED",
    color: "#F98F9B",
    position: "Senior Digital Marketing",
    delay: 100,
  },
  {
    count: "18 K+",
    suffix: "AED",
    color: "#F98F9B",
    position: "Senior Graphic Designer",
    delay: 200,
  },
];

const Counter = () => {
  return (
    <>
      {counters.map((counter, index) => (
        <div className="col-lg-4 col-sm-6" key={index}>
          <div
            className="counter-block-three text-center mt-40"
            data-aos="fade-up"
            data-aos-delay={counter.delay}
          >
            <p className="tx-git-color fs-18 m0">{counter.position}</p>
            <InView>
              {({ ref }) => (
                <div
                  ref={ref}
                  className="main-count"
                  style={{ color: counter.color }}
                >
                  {counter.count} {counter.suffix}
                </div>
              )}
            </InView>
            
          </div>
        </div>
      ))}
    </>
  );
};

export default Counter;
