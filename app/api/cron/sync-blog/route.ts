import { NextResponse } from 'next/server';
import { syncBBCNews } from '@/lib/blog';

// This endpoint can be hit by a cron job (like Vercel Cron or GitHub Actions)
// It should ideally be protected by a secret token in production.
export async function GET(request: Request) {
  const url = new URL(request.url);
  const authHeader = request.headers.get('authorization');
  const token = url.searchParams.get('token');

  // Simple protection for the cron job (Optional but recommended)
  // if (token !== process.env.CRON_SECRET && authHeader !== `Bearer ${process.env.CRON_SECRET}`) {
  //   return NextResponse.json({ error: 'Unauthorized' }, { status: 401 });
  // }

  try {
    const result = await syncBBCNews();
    return NextResponse.json(result);
  } catch (error) {
    console.error(error);
    return NextResponse.json({ success: false, message: "Internal server error" }, { status: 500 });
  }
}
