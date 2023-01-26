// https://www.ibenic.com/gutenberg-components-form-token-field/
import { registerBlockType } from "@wordpress/blocks"
import {
  useBlockProps,
  InspectorControls,
  RichText
} from "@wordpress/block-editor"
import { __ } from "@wordpress/i18n"
import {
  PanelBody,
  FormTokenField,
  PanelRow,
  QueryControls
} from "@wordpress/components"
import { RawHTML, useState } from "@wordpress/element"
import { useSelect, useDispatch } from "@wordpress/data"
import { registerPlugin } from "@wordpress/plugins"
import { PluginDocumentSettingPanel } from "@wordpress/edit-post"
import block from "./block.json"
import icons from "../../icons.js"
import "./main.css"

registerBlockType(block.name, {
  icon: icons.primary,
  edit({ attributes, setAttributes }) {
    const { count } = attributes
    const blockProps = useBlockProps()

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

    const categories = useSelect(
      (select) => {
        return select("core").getEntityRecords("taxonomy", "category")
      },
      [count]
    )

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
          <h2>Sidebar featured posts</h2>
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
                className="md:w-[43%] pr-4"
              >
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
              </section>
            )
          })}
        </div>
      </>
    )
  }
})
