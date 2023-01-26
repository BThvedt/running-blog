import { registerBlockType } from "@wordpress/blocks"
import { useBlockProps, InspectorControls } from "@wordpress/block-editor"
import { useState } from "@wordpress/element"
import {
  PanelBody,
  RangeControl,
  SelectControl,
  TextControl,
  DatePicker
} from "@wordpress/components"
import block from "./block.json"
import { __ } from "@wordpress/i18n"
import icons from "../../icons.js"
import "./main.css"

const runArray = [
  { label: __("Run Distance"), value: "run_distance" },
  { label: __("Minutes per Mile"), value: "minutes_per_mile" },
  { label: __("Time of Day"), value: "run_time_of_day" },
  { label: __("Vest Weight"), value: "vest_weight" },
  { label: __("Arm Weight"), value: "arm_weight" },
  { label: __("Leg Weight"), value: "leg_weight" },
  { label: __("Other Weight"), value: "other_weight" },
  { label: __("Total Weight"), value: "total_weight" },
  { label: __("Run Distance"), value: "run_distance" },
  { label: __("Humidity"), value: "run_distance" },
  { label: __("Wind"), value: "run_distance" },
  { label: __("Heart Rate"), value: "run_distance" },
  { label: __("Power"), value: "run_distance" },
  { label: __("Elevation Gained"), value: "run_distance" },
  { label: __("Cadence"), value: "run_distance" },
  { label: __("Stride Length"), value: "run_distance" },
  { label: __("Ground Contact"), value: "run_distance" },
  { label: __("Vertical Osc"), value: "run_distance" }
]

const raceArray = [
  { label: __("Race Length"), value: "race_length" },
  { label: __("Time Start"), value: "time_start" },
  { label: __("Pace Goal"), value: "pace_goal" },
  { label: __("Actual Pace"), value: "actual_pace" },
  { label: __("Temperature"), value: "temperature" },
  { label: __("Humidity"), value: "humidity" },
  { label: __("Wind"), value: "wind" },
  { label: __("Hill Difficulty"), value: "hill_difficulty" },
  { label: __("Stride Length"), value: "stride_length	" },
  { label: __("Bround Contact"), value: "ground_contact" },
  { label: __("Vertical Osc"), value: "vert_osc" },
  { label: __("Heart Rate"), value: "average_heart_rate" },
  { label: __("Power"), value: "power" },
  { label: __("Elevation Gained"), value: "elevation_gained" },
  { label: __("Cadence"), value: "cadence" },
  { label: __("Starting Energy"), value: "starting_energy" },
  { label: __("Percieved Effort Level"), value: "percieved_effort_level" }
]

const metaArray = [
  { label: __("Is Fast"), value: "is_fast" },
  { label: __("Body Fat"), value: "body_fat" },
  { label: __("BMI"), value: "bmi" },
  { label: __("Body Water"), value: "body_water" },
  { label: __("Bone Density"), value: "bone_density" },
  { label: __("Knee Pain"), value: "knee_pain" },
  { label: __("Sholder Pain"), value: "sholder_pain" },
  { label: __("Energy"), value: "energy" },
  { label: __("Time Awake"), value: "time_awake" },
  { label: __("Body Weight"), value: "body_weight" },
  { label: __("Got Stuff Done"), value: "got_stuff_done" },
  { label: __("Cups of Coffee"), value: "cups_of_coffee" },
  { label: __("Total Calories"), value: "total_calories" },
  { label: __("Total Carbs"), value: "total_carbs" },
  { label: __("Total Protien"), value: "total_protien" },
  { label: __("Total Fiber"), value: "total_fiber" },
  { label: __("Total Sugar"), value: "total_sugar" },
  { label: __("Total Salt"), value: "total_salt" },
  { label: __("Total Fat"), value: "total_fat" }
]

const sleepArray = [
  { label: __("Start Time"), value: "start_time" },
  { label: __("End TIme"), value: "end_time" },
  { label: __("Time Awake"), value: "awake" },
  { label: __("REM Time"), value: "rem" },
  { label: __("Core Time"), value: "core" },
  { label: __("Deep Time"), value: "deep" },
  { label: __("Sleep Cycles"), value: "sleep_cycles" },
  { label: __("Sleeping Hr"), value: "sleeping_hr" },
  { label: __("Sleeping O2"), value: "sleeping_o2" }
]

const workoutArray = [
  { label: __("Pushup Sets"), value: "pushup_sets" },
  { label: __("Pushup Number"), value: "pushup_number" },
  { label: __("Pushup Weight"), value: "pushup_weight" },
  { label: __("Pullup Sets"), value: "pullup_sets" },
  { label: __("Pullup Number"), value: "pullup_number" },
  { label: __("Pullup Weight"), value: "pullup_weight" },
  { label: __("Plank Sets"), value: "plank_sets" },
  { label: __("Plank Length"), value: "plank_length" },
  { label: __("Plank Weight"), value: "plank_weight" },
  { label: __("Deadlift Sets"), value: "deadlift_sets" },
  { label: __("Deadlift Number"), value: "deadlift_number" },
  { label: __("Deadlift Weight"), value: "deadlift_weight" },
  { label: __("Squat Sets"), value: "squat_sets" },
  { label: __("Squat Number"), value: "squat_number" },
  { label: __("Squat Weight"), value: "squat_weight" },
  { label: __("Jumping Jack Sets"), value: "jumping_jack_sets" },
  { label: __("Jumping Jack Number"), value: "jumping_jack_number" },
  { label: __("Jumping Jack Weight"), value: "jumping_jack_weight" }
]

const supplementArray = [{ label: __("Cost"), value: "daily_cost" }]

registerBlockType(block.name, {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const [dataOptions, setDataOptions] = useState(runArray)
    const { graphType, dataType, span } = attributes
    const blockProps = useBlockProps()

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Graph", "running-blog")}>
            <SelectControl
              label={__("Graph Type", "running-blog")}
              value={graphType}
              options={[
                { label: __("Run", "running-blog"), value: "run" },
                { label: __("Race", "running-blog"), value: "race" },
                { label: __("Meta", "running-blog"), value: "meta" },
                { label: __("Sleep", "running-blog"), value: "sleep_data" },
                { label: __("Workout", "running-blog"), value: "workout" },
                { label: __("Supplement", "running-blog"), value: "supplement" }
              ]}
              onChange={(graphType) => {
                switch (graphType) {
                  case "select":
                    setDataOptions([])
                    break
                  case "run":
                    setDataOptions(runArray)
                    break
                  case "race":
                    setDataOptions(raceArray)
                    break
                  case "meta":
                    setDataOptions(metaArray)
                    break
                  case "sleep_data":
                    setDataOptions(sleepArray)
                    break
                  case "workout":
                    setDataOptions(workoutArray)
                    break
                  case "supplement":
                    setDataOptions(supplementArray)
                    break
                }
                setAttributes({ graphType })
              }}
            />
            <SelectControl
              label={__("Data Type", "running-blog")}
              value={dataType}
              options={dataOptions}
              onChange={(dataType) => setAttributes({ dataType })}
            />
            <RangeControl
              label={__("Time Span (months)", "running-blog")}
              onChange={(span) => setAttributes({ span })}
              value={span}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>Graph block</div>
      </>
    )
  } // use server side for the graphs
})
