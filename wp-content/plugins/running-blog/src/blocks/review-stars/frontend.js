import StarRatings from "react-star-ratings"
import { render } from "@wordpress/element"

function ReviewRating(props) {
  let { rating } = props
  return (
    <>
      <StarRatings
        rating={parseFloat(rating)}
        starRatedColor="blue"
        numberOfStars={6}
        isSelectable={false}
        name="rating"
      />
      <h1>
        Rendering the element {rating} {typeof rating}
      </h1>
    </>
    // <StarRatings
    //   rating={rating}
    //   starRatedColor="blue"
    //   numberOfStars={6}
    //   isSelectable={false}
    //   name="rating"
    // />
  )
}

document.addEventListener("DOMContentLoaded", () => {
  const block = document.querySelector("#review-rating")

  const postID = block?.dataset?.postId
  const rating = block?.dataset?.rating

  if (postID && rating) {
    render(<ReviewRating postID={postID} rating={rating} />, block)
  }
})
