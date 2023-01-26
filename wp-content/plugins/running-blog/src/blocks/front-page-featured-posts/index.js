import { registerBlockType } from "@wordpress/blocks"
import {
  useBlockProps,
  InspectorControls,
  RichText
} from "@wordpress/block-editor"
import { __ } from "@wordpress/i18n"
import { PanelBody, QueryControls } from "@wordpress/components"
import { RawHTML } from "@wordpress/element"
import icons from "../../icons.js"
import "./main.css"
import { useSelect } from "@wordpress/data"
import block from "./block.json"
// front-page-featured-posts

registerBlockType(block.name, {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { title, count } = attributes
    const blockProps = useBlockProps()

    // const terms = useSelect((select) => {
    //   return select("core").getEntityRecords("taxonomy", "cuisine", {
    //     per_page: -1
    //   })
    // })

    // const suggestions = {}

    // terms?.forEach((term) => {
    //   suggestions[term.name] = term
    //   suggestions.foo = 10
    // })

    // const cuisineIDs = cuisines.map((term) => term.id)

    // const posts = useSelect(
    //   (select) => {
    //     return select("core").getEntityRecords("postType", "recipe", {
    //       per_page: count,
    //       _embed: true,
    //       cuisine: cuisineIDs,
    //       order: "desc",
    //       orderByRating: 1
    //     })
    //   },
    //   [count, cuisineIDs]
    // )

    // console.log(posts)
    // https://wordpress.stackexchange.com/questions/328277/what-are-all-the-query-parameters-for-getentityrecords
    const posts = useSelect(
      (select) => {
        return select("core").getEntityRecords("postType", "post", {
          per_page: count,
          _embed: true,
          featured: true
        })
      },
      [count]
    )

    // I guess this is only on backend so I don't gotta worry about perforamnce
    // just get all categories and all tags, and then find the ones by ID

    // categories
    const categories = useSelect(
      (select) => {
        return select("core").getEntityRecords("taxonomy", "category")
      },
      [count]
    )

    // tags
    const tags = useSelect(
      (select) => {
        return select("core").getEntityRecords("taxonomy", "post_tag")
      },
      [count]
    )

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Featured Posts", "running-blog")}>
            <QueryControls
              numberOfItems={count}
              minItems={1}
              maxItems={10}
              onNumberOfItemsChange={(count) => setAttributes({ count })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <RichText
            tagName="h6"
            value={title}
            withoutInteractiveFormatting
            onChange={(title) => setAttributes({ title })}
            placeholder={__("Title", "running-blog")}
          />
          {posts?.map((post, index) => {
            const featuredImage =
              post._embedded &&
              post._embedded["wp:featuredmedia"] &&
              post._embedded["wp:featuredmedia"].length > 0 &&
              post._embedded["wp:featuredmedia"][0]

            const { tags: tagsIdsArray } = post
            const { categories: categoryIdsArray } = post

            const tagInfoArray =
              tags && tags.length
                ? tagsIdsArray.map((tagId) => {
                    const theTagInfo = tags?.find((tagInfo) => {
                      return tagInfo.id === tagId
                    })

                    return { name: theTagInfo?.name, link: theTagInfo?.link }
                  })
                : []

            const categoryInfoArray =
              categories && categories.length
                ? categoryIdsArray.map((categoryId) => {
                    const theCategoryInfo = categories?.find((categoryInfo) => {
                      return categoryInfo.id === categoryId
                    })

                    return {
                      name: theCategoryInfo?.name,
                      link: theCategoryInfo?.link
                    }
                  })
                : []

            return (
              <section
                id="front-page-featured-posts"
                className="md:w-[43%] pr-4 md:border-r"
              >
                {index === 0 && (
                  <article
                    id="top-featured-post"
                    className="my-4 pb-4 border-b"
                  >
                    {featuredImage && featuredImage.media_details && (
                      <figure className="w-full mb-4 max-md:h-64 max-lg:h-48 overflow-hidden relative thumbnail-figure shadow-hover">
                        <img
                          src={
                            featuredImage.media_details.sizes.thumbnail
                              .source_url
                          }
                          alt={featuredImage.alt_text}
                          className="object-cover w-full h-full"
                        />

                        <a
                          href={post.link}
                          className="absolute w-full h-full top-0 left-0"
                        >
                          <div className="vignette-radial fade-on-hover" />
                        </a>
                      </figure>
                    )}

                    <h4>
                      {categoryInfoArray.map((categoryInfo) => {
                        return (
                          <a
                            href={categoryInfo.link}
                            className="light-text bold-link handwriting"
                          >
                            {categoryInfo.name}
                          </a>
                        )
                      })}
                    </h4>
                    <a href={post.link} className="hover:underline">
                      <h3 className="text-3xl article-title font-bold my-2">
                        <RawHTML>{post.title.rendered}</RawHTML>
                      </h3>
                      <div className="mb-2 text-lg">
                        <RawHTML>{post.excerpt.rendered}</RawHTML>
                      </div>
                    </a>
                    <p>
                      {tagInfoArray.map((tagInfo) => {
                        return (
                          <>
                            <a
                              href={tagInfo.link}
                              className="light-text subtle-site-link handwriting"
                            >
                              {tagInfo.name}
                            </a>{" "}
                          </>
                        )
                      })}
                    </p>
                  </article>
                )}
                {index !== 0 && (
                  <article
                    className={`my-4 pb-4 flex flex-col-reverse lg:flex-row ${
                      index !== posts.length - 1 ? "border-b" : ""
                    }`}
                  >
                    <div>
                      <h4 className="-mt-1">
                        {categoryInfoArray.map((categoryInfo) => {
                          return (
                            <a
                              href={categoryInfo.link}
                              className="light-text bold-link handwriting"
                            >
                              {categoryInfo.name}
                            </a>
                          )
                        })}
                      </h4>
                      <a href={post.link} className="hover:underline">
                        <h3 className="text-3xl article-title font-bold my-2">
                          <RawHTML>{post.title.rendered}</RawHTML>
                        </h3>
                        <div className="mb-2 text-lg">
                          <RawHTML>{post.excerpt.rendered}</RawHTML>
                        </div>
                      </a>

                      <p className="lg:hidden">
                        {tagInfoArray.map((tagInfo) => {
                          return (
                            <>
                              <a
                                href={tagInfo.link}
                                className="light-text subtle-site-link handwriting"
                              >
                                {tagInfo.name}
                              </a>{" "}
                            </>
                          )
                        })}
                      </p>
                    </div>
                    <div className="lg:ml-4">
                      {featuredImage && featuredImage.media_details && (
                        <figure className="shadow-lg mb-3 md:max-lg:h-40 lg:h-40 lg:max-xl:w-48 xl:h-40 xl:w-56 md:shrink-0 overflow-hidden relative thumbnail-figure shadow-hover">
                          <img
                            className="object-cover w-full h-full"
                            src={
                              featuredImage.media_details.sizes.thumbnail
                                .source_url
                            }
                            alt={featuredImage.alt_text}
                          />

                          <a
                            href={post.link}
                            className="absolute w-full h-full top-0 left-0"
                          >
                            <div className="vignette-radial fade-on-hover" />
                          </a>
                        </figure>
                      )}

                      <p class="hidden lg:block">
                        {tagInfoArray.map((tagInfo) => {
                          return (
                            <>
                              <a
                                href={tagInfo.link}
                                className="light-text subtle-site-link handwriting"
                              >
                                {tagInfo.name}
                              </a>{" "}
                            </>
                          )
                        })}
                      </p>
                    </div>
                  </article>
                )}
              </section>
            )
          })}
        </div>
      </>
    )
  }
})
