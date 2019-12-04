@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($posts as $post)
    <url>
      <loc>{{ route('post.show',['post_id'=>$post->id,'slug'=>$post->slug]) }}</loc>
      <changefreq>daily</changefreq>
      <priority>1</priority>
    </url>
  @endforeach
</urlset>
