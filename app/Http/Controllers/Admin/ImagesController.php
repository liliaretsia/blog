<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Image;
use App\Entity\ImageTagLink;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImageRequest;
use App\Http\Requests\Admin\PhotosRequest;
use App\Services\Auth\RegisterService;
use App\Services\Images\ImageService;
use DB;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * @var ImageService
     */
    private $service;

    /**
     * ImagesController constructor.
     * @param ImageService $service
     */
    public function __construct(ImageService $service)
    {

        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $image = (new Image)->newQuery();
        $filteredTags = $request->get('tag');
        if (!empty($filteredTags)) {
            $image->whereHas('tags',
                function ($query) use ($filteredTags) {
                    $query->whereIn('tags.id',
                        $filteredTags);
                });
        }

        $images = $image->get();
        $tags = (new Image)->tagsList();

        return view('admin.images.index', compact('images','tags', 'filteredTags'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = (new Image)->tagsList();

        return view('admin.images.create', compact('tags'));
    }

    /**
     * @param ImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ImageRequest $request)
    {
        $image = Image::create([
            'content' => $request['content'],
        ]);

        $tagsIds = $request['tag'];
        if ($tagsIds) {
            foreach ($tagsIds as $tagsId) {
                ImageTagLink::create([
                    'image_id' => $image->id,
                    'tag_id' => $tagsId,
                ]);
            }
        }

        return redirect()->route('admin.images.show', $image);
    }

    /**
     * @param Image $image
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Image $image)
    {
        return view('admin.images.show', compact('image'));
    }

    /**
     * @param Image $image
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Image $image)
    {
        $tags = (new Image)->tagsList();

        $imageTags = [];
        foreach ($image->tags as $tag) {
            $imageTags[] = $tag->id;
        }

        return view('admin.images.edit', compact('image', 'tags', 'imageTags'));
    }

    /**
     * @param ImageRequest $request
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ImageRequest $request, Image $image)
    {
        $image->update($request->only(['content', 'tag_id']));

        $imageTagLinks = ImageTagLink::query()->where('image_id', $image->id)->get();
        $ids = [];
        foreach ($imageTagLinks as $imageTagLink) {
            $ids[] = $imageTagLink->id;
        }
        ImageTagLink::destroy($ids);

        $tagsIds = $request['tag'];
        if ($tagsIds) {
            foreach ($tagsIds as $tagsId) {
                ImageTagLink::create([
                    'image_id' => $image->id,
                    'tag_id' => $tagsId,
                ]);
            }
        }

        return redirect()->route('admin.images.show', $image);
    }

    /**
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('admin.images.index');
    }

    /**
     * @param Image $image
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photosForm(Image $image)
    {
        return view('admin.images.edit.photos', compact('image'));
    }

    /**
     * @param PhotosRequest $request
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function photos(PhotosRequest $request, Image $image)
    {
        try {
            $this->service->addPhotos($image->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.images.show', $image);
    }

}
